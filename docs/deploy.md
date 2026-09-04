# Deploying Teratak Moro Seneng

The live site at <https://homestaymoroseneng.pages.dev> is hosted on
**Cloudflare Pages**, which serves static files only — it never runs PHP.

So the Laravel app is the *source*, and what actually gets deployed is a static
export of it sitting in `public/`.

## The one rule

**After changing any wording or markup, run the export and commit the result.**

```bash
php artisan site:export
```

That renders the site twice and writes:

| File                   | Served at | Language |
| ---------------------- | --------- | -------- |
| `public/index.html`    | `/`       | Malay    |
| `public/en/index.html` | `/en/`    | English  |

Skip this step and the deploy ships the previous wording — the Blade change
simply never reaches visitors. (This is what caused the site and the Blade to
drift apart on the contact number in the past.)

## Full flow

```bash
php artisan site:export        # 1. regenerate the static pages
git add -A                     # 2. stage source + export together
git commit -m "..."
git push                       # 3. Cloudflare Pages builds from the push
```

## Where the text lives

Nothing visible is written into the Blade. All copy is in:

- `lang/ms/site.php` — Malay (the default language)
- `lang/en/site.php` — English

The two files must stay key-for-key identical; a key missing from one shows up
on screen as the raw key name. To check:

```bash
php -r '
function flat($a,$p=""){ $o=[]; foreach($a as $k=>$v){ $key=$p?"$p.$k":$k;
  if(is_array($v)&&array_keys($v)!==range(0,count($v)-1)) $o+=flat($v,$key); else $o[$key]=1; } return $o; }
$en=flat(require "lang/en/site.php"); $ms=flat(require "lang/ms/site.php");
print_r(array_keys(array_diff_key($en,$ms) + array_diff_key($ms,$en)));'
```

An empty array means they match.

## Local preview

```bash
php artisan serve
```

`/` and `/en` render through Laravel from the same Blade and lang files, so what
you see locally is what the export will contain.

## Paths

Image paths are written root-relative (`/images/...`), not through `asset()`.
`public/` is the web root both under Laravel and on Pages, so the same paths
work in local dev, on preview deployments and in production.
