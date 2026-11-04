# Booking calendar + WhatsApp approval — setup

The booking form (`resources/views/index.blade.php`) shows an availability
calendar. Dates painted **red** are booked and cannot be selected.

## The flow

```
1. Customer picks dates, submits the form
       -> a row is added to the Google Sheet with status = "pending"
       -> the OWNER gets a WhatsApp alert: "New booking REQUEST ..."
       -> the customer's WhatsApp also opens with the same request (optional)

2. Owner opens the Google Sheet, checks the dates, and changes that row's
   "status" cell from  pending  ->  confirmed

3. The website calendar now shows those dates in red for everyone.
   (status = pending never blocks anything, so the form cannot be spammed.)
```

Homestay and Event Hall share one calendar — any confirmed row blocks that date
for both.

## 1. Sheet columns

The sheet ("Moro Seneng Booking DB") already has its Malay headers — **keep
them**. The script accepts Malay or English names. You only have to add the
**Status** column:

| A: Timestamp | B: Nama | C: Jenis | D: Dari | E: Hingga | **F: Status** |
|---|---|---|---|---|---|
| 14/08/2026 15:44 | amirah | Ruang Majlis | 2026-08-16 | 2026-08-17 | `confirmed` |

Accepted header names per field:

| field | headers it will match |
|---|---|
| timestamp | `Timestamp`, `Masa`, `Tarikh/Masa` |
| name | `Name`, `Nama` |
| type | `Type`, `Jenis` |
| from | `From`, `Dari`, `Tarikh Dari` |
| to | `To`, `Hingga`, `Sehingga`, `Tarikh Hingga` |
| status | `Status`, `Kelulusan` |

`Dari` / `Hingga` hold plain dates like `2026-09-10`.
Without a **Status** column `doGet` returns `[]` and nothing is ever blocked.

## 2. Turn on the WhatsApp alert (CallMeBot — free)

One-time, on the **owner's** phone:

1. Save **+34 644 51 74 66** as a contact called `CallMeBot`.
2. From the owner's WhatsApp, send that contact exactly:
   `I allow callmebot to send me messages`
3. It replies: `API Activated for your phone number. Your APIKEY is 1234567`
4. Copy that number — it goes into the script below as `CALLMEBOT_APIKEY`.

(If you skip this, bookings still save to the Sheet; only the auto-alert is off.
The customer's own WhatsApp message still reaches you.)

## 3. Apps Script

Google Sheet → **Extensions → Apps Script**. Delete everything in `Code.gs` and
paste the whole of **[apps-script/Code.gs](apps-script/Code.gs)** from this repo.

Fill in `ADMIN_PHONE` and `CALLMEBOT_APIKEY` at the top, **Save**, then
**Deploy → Manage deployments → (edit, pencil icon) → Version: New version →
Deploy**. Keep **Execute as: Me** and **Who has access: Anyone**.

## 4. Make Status a dropdown (no typos)

In the Apps Script editor pick **`setupSheet`** in the function dropdown and
press **Run**, once. It turns column F into a real dropdown with only three
choices, colour-codes them, and fills any blank status with `pending`:

| value | colour | effect on the website |
|---|---|---|
| `pending` | amber | dates stay **open** (default for new requests) |
| `confirmed` | green | dates go **red / blocked** |
| `cancelled` | red | dates stay **open** |

Typing anything else is rejected by the sheet, so `confimed` / `Confirmed ` /
`CONFIRM` can never silently fail to block a date.

Re-run `setupSheet` any time — it replaces its own rules instead of stacking
them. (Manual equivalent, if you prefer: select `F2:F` → **Data → Data
validation → Add rule → Dropdown**, enter the three values, and set
*"Reject the input"*.)

## 5. Test

1. **Alert:** in the Apps Script editor, choose `testAlert` in the function
   dropdown and press **Run** (it asks for permissions the first time). You
   should get a WhatsApp message. If not, re-check `ADMIN_PHONE` /
   `CALLMEBOT_APIKEY`.
   Also open the `/exec` URL in a browser — it should print
   `[{"from":"2026-08-16","to":"2026-08-17"}]` once that row is `confirmed`.
2. **Request:** open the website, submit a booking. A `pending` row appears in
   the Sheet and the owner gets the alert. The calendar is unchanged.
3. **Approve:** change that row's `status` to `confirmed`. Reload the site,
   open the form — those days are now red and unclickable.
4. **Undo:** set `status` back to `pending` (or delete the row) → dates reopen.

## 6. Prices on the calendar (tab "Harga")

Every open day on the calendar shows its price under the date (like a flight
fare calendar). The cheapest days of the month are green, special/holiday days
are orange, and once the guest picks dates a box shows the **estimated total**.
That estimate is also added to the WhatsApp message, the owner's alert, and the
sheet row (if the booking tab has an `Anggaran` column).

**Setup, once:** in the Apps Script editor pick **`setupPriceSheet`** → **Run**.
It creates a tab called `Harga` with example rows and dropdowns:

| Jenis | Kategori | Dari | Hingga | Harga | Label |
|---|---|---|---|---|---|
| Homestay | weekday | | | 250 | |
| Homestay | weekend | | | 350 | |
| Event Hall | default | | | 1500 | |
| Event Hall | weekend | | | 2000 | |
| Homestay | season | 2026-11-21 | 2027-01-03 | 320 | Cuti sekolah |
| Homestay | weekend | 2026-11-21 | 2027-01-03 | 420 | Cuti sekolah |
| Semua | special | 2026-12-24 | 2026-12-26 | 450 | Krismas |

**Rule of thumb: no dates = default price all year. With dates = a season
that replaces the default for those days only.**

- **Jenis**: `Homestay`, `Event Hall`, `Event Hall + Homestay` (the package),
  or `Semua` (= all three). Give the package its own rows — it does **not** add
  the Homestay and Event Hall prices together.
- **How the total is counted:** Homestay and the package are **per night**
  (9 → 10 Nov = 1 night, priced at 9 Nov; check-out day free). Event Hall
  alone is **per day** (9 → 10 Nov = 2 days).
- **Kategori**:
  - `default` — one price for every day (no dates).
  - `weekday` / `weekend` — normal price on weekdays / weekends. Add **Dari** and
    **Hingga** to make it a season's weekday / weekend price.
  - `season` — every day inside **Dari–Hingga** (dates required).
  - `special` — cuti / perayaan, beats everything, shown orange (dates required).
- **Harga**: price per day in RM, numbers only.
- **Label**: optional; shows when the guest hovers the date (e.g. `Hari Raya`).

Which price wins for a day, highest first:
**special > weekday/weekend with dates > season > weekday/weekend > default**.
A row for the exact Jenis beats a `Semua` row, and if two rows still tie the
**lower row in the sheet wins** — so a new season added at the bottom
overrides older ones. Weekend = Saturday + Sunday by default; change
`WEEKEND_DAYS` at the top of `Code.gs` (e.g. `[5, 6]` for Fri + Sat).

Price edits show on the website straight away (within a minute) — **no
redeploy needed** for price changes, only for changes to `Code.gs` itself.
A day with no matching row simply shows no price, and no total is shown.

Check: open `<exec URL>?prices=1` in a browser — it should print
`{"booked":[...],"prices":{"weekendDays":[6,0],"rules":[...]}}`.

## Notes

- The website's `SHEET_WEBAPP_URL` (in `index.blade.php`, section 00 of the
  script) must be the `/exec` URL of **this** deployment.
- The deployment must be **Who has access: Anyone**, or the browser can't read
  the calendar JSON and it silently falls back to "all dates open".
- Every time you change `Code.gs` you must **Deploy → New version** for the
  live site to pick it up.
