/* =====================================================================
 * TERATAK MORO SENENG — booking backend
 * Google Apps Script bound to the sheet "Moro Seneng Booking DB"
 * ---------------------------------------------------------------------
 * SHEET LAYOUT (row 1 headers — keep your existing Malay names,
 * just add the Status column):
 *
 *   A: Timestamp | B: Nama | C: Jenis | D: Dari | E: Hingga | F: Status
 *
 * HOW IT WORKS
 *   doPost  — the website calls this when a customer submits the form.
 *             Adds a row with Status = "pending" and sends the owner a
 *             WhatsApp alert (CallMeBot).
 *   doGet   — the website calls this to draw the calendar. Returns only
 *             the rows whose Status is "confirmed", as JSON:
 *             [{ "from": "2026-08-16", "to": "2026-08-17" }, ...]
 *
 * A date only turns RED on the website AFTER the owner opens this sheet
 * and changes that row's Status from "pending" to "confirmed".
 *
 * AFTER EVERY EDIT: Deploy > Manage deployments > edit > New version.
 * ===================================================================== */


/* ---------------------------------------------------------------------
   SETTINGS — fill these in
   --------------------------------------------------------------------- */

// Owner's WhatsApp number. International format, digits only (no +, no spaces).
var ADMIN_PHONE = '601163400466';

// CallMeBot API key for that number. One-time setup on the owner's phone:
//   1. Save +34 644 51 74 66 as a contact.
//   2. WhatsApp it:  I allow callmebot to send me messages
//   3. It replies "your APIKEY is 1234567" — paste that number here.
// Leave '' to skip the alert (the row is still saved to the sheet).
var CALLMEBOT_APIKEY = '';

// Which tab holds the data. '' = the first tab.
var SHEET_NAME = '';

// Which tab holds the prices. Run setupPriceSheet once to create it.
var PRICE_SHEET_NAME = 'Harga';

// Which days count as "weekend" pricing. 0 = Sunday, 1 = Monday ... 6 = Saturday.
// Default: Saturday + Sunday. Many homestays use Friday + Saturday — then [5, 6].
var WEEKEND_DAYS = [6, 0];


/* ---------------------------------------------------------------------
   Header aliases — Malay and English are both accepted, so the sheet
   headers never have to be renamed.
   --------------------------------------------------------------------- */
var COLS = {
  timestamp: ['timestamp', 'masa', 'tarikh/masa'],
  name:      ['name', 'nama'],
  type:      ['type', 'jenis'],
  from:      ['from', 'dari', 'tarikh dari'],
  to:        ['to', 'hingga', 'sehingga', 'tarikh hingga'],
  status:    ['status', 'kelulusan'],
  estimate:  ['estimate', 'anggaran', 'anggaran harga']   /* optional column */
};

/* Headers of the "Harga" (price) tab. */
var PRICE_COLS = {
  type:  ['jenis', 'type'],
  kind:  ['kategori', 'category', 'kind'],
  from:  ['dari', 'from', 'tarikh dari'],
  to:    ['hingga', 'to', 'sehingga', 'tarikh hingga'],
  price: ['harga', 'price', 'harga (rm)'],
  label: ['label', 'nota', 'catatan', 'note']
};

/* What the owner may type in "Kategori" -> what the website understands. */
var PRICE_KINDS = {
  'default': 'default', 'harga asas': 'default', 'asas': 'default',
  'season': 'season',   'musim': 'season', 'musim cuti': 'season',
  'weekday': 'weekday', 'hari biasa': 'weekday',
  'weekend': 'weekend', 'hujung minggu': 'weekend',
  'special': 'special', 'cuti khas': 'special', 'cuti umum': 'special',
  'perayaan': 'special', 'holiday': 'special'
};

/* "Jenis" values in the price tab. "Semua" / blank = applies to all three.
   These must match the website's booking-type values exactly. */
var PRICE_TYPES = ['Homestay', 'Event Hall', 'Event Hall + Homestay', 'Semua'];

/* The only values the Status column accepts. Only "confirmed" blocks a date. */
var STATUS_VALUES = ['pending', 'confirmed', 'cancelled'];


/* ---------------------------------------------------------------------
   Helpers
   --------------------------------------------------------------------- */

function getSheet_() {
  var ss = SpreadsheetApp.getActiveSpreadsheet();
  return SHEET_NAME ? ss.getSheetByName(SHEET_NAME) : ss.getSheets()[0];
}

/* Maps each field to its column number, or -1 when that column is absent. */
function colIndex_(sheet, cols) {
  cols = cols || COLS;
  var head = sheet.getRange(1, 1, 1, sheet.getLastColumn()).getValues()[0]
    .map(function (h) { return String(h).trim().toLowerCase(); });

  var idx = {};
  Object.keys(cols).forEach(function (key) {
    idx[key] = -1;
    cols[key].forEach(function (alias) {
      if (idx[key] === -1) idx[key] = head.indexOf(alias);
    });
  });
  return idx;
}

/* A cell may hold a real Date or plain text — normalise both to yyyy-mm-dd. */
function isoDate_(v) {
  if (v instanceof Date) {
    return Utilities.formatDate(v, Session.getScriptTimeZone(), 'yyyy-MM-dd');
  }
  return String(v).trim().slice(0, 10);
}

function json_(obj) {
  return ContentService
    .createTextOutput(JSON.stringify(obj))
    .setMimeType(ContentService.MimeType.JSON);
}


/* ---------------------------------------------------------------------
   doPost — a customer submitted the booking form
   --------------------------------------------------------------------- */
function doPost(e) {
  var lock = LockService.getScriptLock();
  lock.waitLock(20000);
  try {
    var p    = (e && e.parameter) || {};
    var name = String(p.name || '').trim();
    var type = String(p.type || '').trim();
    var from = String(p.from || '').trim();
    var to   = String(p.to   || '').trim() || from;
    var est  = String(p.estimate || '').trim();

    if (!name || !from) {
      return json_({ ok: false, error: 'missing name or date' });
    }

    var sheet = getSheet_();
    var idx   = colIndex_(sheet);
    var row   = new Array(sheet.getLastColumn()).fill('');

    if (idx.timestamp > -1) row[idx.timestamp] = new Date();
    if (idx.name      > -1) row[idx.name]      = name;
    if (idx.type      > -1) row[idx.type]      = type;
    if (idx.from      > -1) row[idx.from]      = from;
    if (idx.to        > -1) row[idx.to]        = to;
    if (idx.status    > -1) row[idx.status]    = 'pending';
    if (idx.estimate  > -1) row[idx.estimate]  = est;

    sheet.appendRow(row);

    notifyAdmin_(name, type, from, to, est);

    return json_({ ok: true });
  } catch (err) {
    return json_({ ok: false, error: String(err) });
  } finally {
    lock.releaseLock();
  }
}


/* ---------------------------------------------------------------------
   notifyAdmin_ — WhatsApp alert so the owner knows to approve
   --------------------------------------------------------------------- */
function notifyAdmin_(name, type, from, to, estimate) {
  if (!ADMIN_PHONE || !CALLMEBOT_APIKEY) return;

  var msg =
    'TEMPAHAN BARU (REQUEST) - Teratak Moro Seneng\n\n' +
    'Nama: '   + (name || '-') + '\n' +
    'Jenis: '  + (type || '-') + '\n' +
    'Tarikh: ' + (from || '-') + ' hingga ' + (to || '-') + '\n' +
    (estimate ? 'Anggaran: ' + estimate + '\n' : '') + '\n' +
    'Status: PENDING.\n' +
    'Buka Google Sheet, tukar "Status" baris ini kepada "confirmed" ' +
    'untuk blok tarikh ini di website.';

  var url = 'https://api.callmebot.com/whatsapp.php'
    + '?phone='  + encodeURIComponent(ADMIN_PHONE)
    + '&apikey=' + encodeURIComponent(CALLMEBOT_APIKEY)
    + '&text='   + encodeURIComponent(msg);

  try {
    UrlFetchApp.fetch(url, { muteHttpExceptions: true });
  } catch (err) {
    /* The alert failed but the booking row is already saved — just log it. */
    console.error('CallMeBot notify failed: ' + err);
  }
}


/* ---------------------------------------------------------------------
   testAlert — pick this in the editor's function dropdown and press Run.
   Grants the script its permissions the first time and proves the
   WhatsApp alert actually reaches the owner's phone.
   --------------------------------------------------------------------- */
function testAlert() {
  notifyAdmin_('UJIAN / TEST', 'Ruang Majlis', '2026-01-01', '2026-01-02');
}


/* ---------------------------------------------------------------------
   setupSheet — pick this in the function dropdown and press Run, ONCE.
   Turns the Status column into a real dropdown so it can never be
   mistyped, colour-codes it, and fills any blank status with "pending".
   Safe to run again later (it replaces its own rules, never stacks them).
   --------------------------------------------------------------------- */
function setupSheet() {
  var sheet = getSheet_();
  var idx   = colIndex_(sheet);

  if (idx.status === -1) {
    throw new Error('No "Status" column. Add a header cell called Status first.');
  }

  var col   = idx.status + 1;                 /* getRange wants 1-based */
  var rows  = Math.max(sheet.getMaxRows() - 1, 1);
  var range = sheet.getRange(2, col, rows, 1);

  /* 1. The dropdown itself. setAllowInvalid(false) makes Sheets reject
        anything typed by hand that isn't in the list. */
  range.setDataValidation(
    SpreadsheetApp.newDataValidation()
      .requireValueInList(STATUS_VALUES, true)
      .setAllowInvalid(false)
      .setHelpText('Pick one: ' + STATUS_VALUES.join(' / ') +
                   '. Only "confirmed" blocks the dates on the website.')
      .build()
  );

  /* 2. Colour, so the sheet can be scanned at a glance. Drop any rule we
        added to this column before, then re-add — otherwise re-running
        this function would pile up duplicates. */
  var keep = sheet.getConditionalFormatRules().filter(function (rule) {
    return rule.getRanges().every(function (r) { return r.getColumn() !== col; });
  });

  var palette = {
    confirmed: ['#D4EDDA', '#155724'],
    pending:   ['#FFF3CD', '#856404'],
    cancelled: ['#F8D7DA', '#721C24']
  };

  Object.keys(palette).forEach(function (value) {
    keep.push(
      SpreadsheetApp.newConditionalFormatRule()
        .whenTextEqualTo(value)
        .setBackground(palette[value][0])
        .setFontColor(palette[value][1])
        .setRanges([range])
        .build()
    );
  });

  sheet.setConditionalFormatRules(keep);

  /* 3. Backfill blanks on rows that actually hold a booking. Only touch
        up to getLastRow() — writing to the whole column would stamp
        "pending" onto hundreds of empty rows. */
  var lastRow = sheet.getLastRow();
  if (lastRow >= 2) {
    var used    = sheet.getRange(2, col, lastRow - 1, 1);
    var values  = used.getValues();
    var changed = false;

    values.forEach(function (row) {
      if (String(row[0]).trim() === '') { row[0] = 'pending'; changed = true; }
    });

    if (changed) used.setValues(values);
  }

  SpreadsheetApp.getActiveSpreadsheet()
    .toast('Status dropdown is ready.', 'Moro Seneng', 5);
}


/* ---------------------------------------------------------------------
   setupPriceSheet — pick this in the function dropdown and press Run, ONCE.
   Creates the "Harga" tab with headers, example prices and dropdowns.
   If the tab already exists it only refreshes the dropdowns — your
   prices are never overwritten.
   --------------------------------------------------------------------- */
function setupPriceSheet() {
  var ss    = SpreadsheetApp.getActiveSpreadsheet();
  var sheet = ss.getSheetByName(PRICE_SHEET_NAME);

  if (!sheet) {
    sheet = ss.insertSheet(PRICE_SHEET_NAME);
    sheet.getRange(1, 1, 1, 6)
      .setValues([['Jenis', 'Kategori', 'Dari', 'Hingga', 'Harga', 'Label']])
      .setFontWeight('bold');
    /* Example rows — change the numbers to your real prices.
       No dates = the normal (default) price, used all year.
       With dates = a season that replaces the default for those days. */
    sheet.getRange(2, 1, 10, 6).setValues([
      ['Homestay',   'weekday', '',           '',           250,  ''],
      ['Homestay',   'weekend', '',           '',           350,  ''],
      ['Event Hall', 'default', '',           '',           1500, ''],
      ['Event Hall', 'weekend', '',           '',           2000, ''],
      ['Event Hall + Homestay', 'weekday', '', '',          1600, 'Pakej'],
      ['Event Hall + Homestay', 'weekend', '', '',          2200, 'Pakej'],
      ['Homestay',   'season',  '2026-11-21', '2027-01-03', 320,  'Cuti sekolah'],
      ['Homestay',   'weekend', '2026-11-21', '2027-01-03', 420,  'Cuti sekolah'],
      ['Semua',      'special', '2026-12-24', '2026-12-26', 450,  'Krismas'],
      ['Semua',      'special', '2027-03-20', '2027-03-22', 500,  'Hari Raya']
    ]);
    sheet.getRange('C:D').setNumberFormat('@');   /* keep dates as plain text */
    sheet.setFrozenRows(1);
    sheet.autoResizeColumns(1, 6);
  }

  var idx  = colIndex_(sheet, PRICE_COLS);
  var rows = Math.max(sheet.getMaxRows() - 1, 1);

  if (idx.type > -1) {
    sheet.getRange(2, idx.type + 1, rows, 1).setDataValidation(
      SpreadsheetApp.newDataValidation()
        .requireValueInList(PRICE_TYPES, true).setAllowInvalid(false)
        .setHelpText('Homestay / Event Hall / Event Hall + Homestay (pakej, dikira ikut malam) / ' +
                     'Semua (= semua jenis)').build());
  }
  if (idx.kind > -1) {
    sheet.getRange(2, idx.kind + 1, rows, 1).setDataValidation(
      SpreadsheetApp.newDataValidation()
        .requireValueInList(['default', 'weekday', 'weekend', 'season', 'special'], true)
        .setAllowInvalid(false)
        .setHelpText('default = harga asas semua hari, weekday = hari biasa, ' +
                     'weekend = hujung minggu, season = musim (isi Dari & Hingga), ' +
                     'special = cuti / perayaan (isi Dari & Hingga). ' +
                     'Isi Dari & Hingga pada weekday/weekend = harga musim itu sahaja.').build());
  }

  ss.toast('Price tab "' + PRICE_SHEET_NAME + '" is ready.', 'Moro Seneng', 5);
}


/* ---------------------------------------------------------------------
   readPrices_ — the "Harga" tab as rules the website applies per day.
   Priority on the website, highest first:
     special  >  weekday/weekend WITH dates  >  season  >
     weekday/weekend without dates  >  default
   A rule for a specific Jenis beats a "Semua" rule, and when two rows are
   otherwise equal the LOWER row in the sheet wins (newest overrides).
   --------------------------------------------------------------------- */
function readPrices_() {
  var sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName(PRICE_SHEET_NAME);
  var out   = { weekendDays: WEEKEND_DAYS, rules: [] };
  if (!sheet || sheet.getLastRow() < 2) return out;

  var idx = colIndex_(sheet, PRICE_COLS);
  if (idx.kind === -1 || idx.price === -1) return out;

  var values = sheet.getDataRange().getValues();
  values.shift();

  values.forEach(function (r) {
    var kind  = PRICE_KINDS[String(r[idx.kind]).trim().toLowerCase()];
    var price = Number(String(r[idx.price]).replace(/[^0-9.]/g, ''));
    if (!kind || !price) return;

    var type = idx.type > -1 ? String(r[idx.type]).trim() : '';
    if (/^(semua|all)$/i.test(type)) type = '';

    var rule = { type: type, kind: kind, price: price,
                 label: idx.label > -1 ? String(r[idx.label]).trim() : '' };

    /* Any row may carry dates. season / special must; for the others the
       dates turn a default/weekday/weekend price into a seasonal one. */
    var from = idx.from > -1 ? isoDate_(r[idx.from]) : '';
    var to   = idx.to   > -1 ? isoDate_(r[idx.to])   : '';
    if (!from && (kind === 'season' || kind === 'special')) return;
    if (from) {
      rule.from = from;
      rule.to   = to || from;
    }
    out.rules.push(rule);
  });

  return out;
}


/* ---------------------------------------------------------------------
   doGet — the website's calendar asking which dates are taken
   Only "confirmed" rows are returned; "pending" never blocks a date,
   so the form cannot be used to spam the calendar.

   ?prices=1  ->  { booked: [{from,to}...], prices: {weekendDays, rules} }
   (no param) ->  [{from,to}...]   — the old shape, kept for older pages
   --------------------------------------------------------------------- */
function doGet(e) {
  var booked = readBooked_();
  if (e && e.parameter && e.parameter.prices) {
    return json_({ booked: booked, prices: readPrices_() });
  }
  return json_(booked);
}

function readBooked_() {
  var sheet  = getSheet_();
  var values = sheet.getDataRange().getValues();
  if (values.length < 2) return [];

  var idx = colIndex_(sheet);
  if (idx.from === -1 || idx.status === -1) return [];

  values.shift();                       /* drop the header row */

  var out = [];
  values.forEach(function (r) {
    if (String(r[idx.status]).trim().toLowerCase() !== 'confirmed') return;

    var from = isoDate_(r[idx.from]);
    var to   = idx.to > -1 ? isoDate_(r[idx.to]) : from;
    if (from) out.push({ from: from, to: to || from });
  });

  return out;
}
