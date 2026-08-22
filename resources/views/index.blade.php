<!DOCTYPE html>
<html lang="en">
<head>
<!-- ===================================================================
     TERATAK MORO SENENG — Traditional Homestay & Event Venue
     Batu 38, Sabak Bernam, Selangor, Malaysia
     -------------------------------------------------------------------
     Tech stack : HTML5 + vanilla CSS + vanilla JavaScript (no framework)
     Build      : SINGLE FILE — CSS and JS are inlined within. No external
                 files except Google Fonts and placeholder images.
     -------------------------------------------------------------------
     BEFORE LAUNCH — search the project for "REPLACE:" and update:
       1. Contact / phone number — set WA_NUMBER in the <script> below
       2. Unsplash placeholder images -> real photos in /assets/images/
       3. Google Maps coordinates
       4. Social media links in the footer
       5. Canonical domain + og:url
     =================================================================== -->

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#6B4F2A">

  <!-- ============================ SEO ============================ -->
  <title>Teratak Moro Seneng | Traditional Homestay &amp; Event Venue in Sabak Bernam</title>
  <meta name="description" content="Experience traditional Malay living at Teratak Moro Seneng, Batu 38 Sabak Bernam. A spacious homestay and a beautiful event venue for weddings, engagements and family gatherings.">
  <meta name="keywords" content="homestay Sabak Bernam, homestay Selangor, kampung house rental, event venue Sabak Bernam, wedding venue, akad nikah venue Selangor, engagement ceremony, family gathering">
  <meta name="author" content="Teratak Moro Seneng">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="https://homestaymoroseneng.pages.dev/">

  <!-- ======================== Open Graph ========================= -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="en_MY">
  <meta property="og:site_name" content="Teratak Moro Seneng">
  <meta property="og:title" content="Teratak Moro Seneng | Traditional Homestay &amp; Event Venue in Sabak Bernam">
  <meta property="og:description" content="Sleep in a spacious traditional Malay house, surrounded by tranquil village greenery — or make lasting memories at your engagement, akad nikah, persanding ceremony or family gathering here.">
  <meta property="og:url" content="https://homestaymoroseneng.pages.dev/">
  <meta property="og:image" content="https://homestaymoroseneng.pages.dev/images/moroseneng5.jpeg">
  <meta property="og:image:width" content="719">
  <meta property="og:image:height" content="814">
  <meta property="og:image:alt" content="Exterior view of Teratak Moro Seneng, a traditional wooden house at dusk">

  <!-- ========================== Twitter ========================== -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Teratak Moro Seneng | Traditional Homestay &amp; Event Venue">
  <meta name="twitter:description" content="Traditional Malay living in Batu 38, Sabak Bernam. A homestay for families, an event venue for weddings and ceremonies.">
  <meta name="twitter:image" content="https://homestaymoroseneng.pages.dev/images/moroseneng5.jpeg">

  <!-- ===================== Fonts (preconnect) ====================== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://images.unsplash.com" crossorigin>
  <!--
    Fraunces          — display font. A warm serif; its soft/wonk axis
                        echoes the carved woodwork of a kampung house.
    Plus Jakarta Sans — body font. Designed in Jakarta; clean and readable.
  -->
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;9..144,400;9..144,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- ========================== Styles ============================= -->
  <!-- ===== All styles are inlined here (originally css/style.css) ===== -->
  <style>
/* =====================================================================
   TERATAK MORO SENENG — style.css
   ---------------------------------------------------------------------
   TABLE OF CONTENTS
   01. Design tokens
   02. Reset & base
   03. Typography helpers
   04. Layout: container, section, rule, ukiran band
   05. Buttons & links
   06. Preloader
   07. Navigation
   08. Hero
   09. About
   10. Services cards
   11. Why choose us
   12. Accommodation (wood band)
   13. Gallery + filters + lightbox
   14. Event banner
   15. Testimonials
   16. Location
   17. FAQ accordion
   18. Contact CTA
   19. Footer
   20. Floating action buttons
   21. Reveal animations
   22. Responsive breakpoints
   23. Reduced motion & print
   ===================================================================== */


/* =====================================================================
   01. DESIGN TOKENS
   ===================================================================== */
:root {
  /* --- Brand palette (from the brief) --- */
  --wood:        #6B4F2A;   /* Primary — traditional wood brown */
  --beige:       #D8C3A5;   /* Secondary — soft beige           */
  --green:       #2F6B3B;   /* Accent — nature green            */
  --bg:          #F8F6F2;   /* Page background                  */
  --ink:         #222222;   /* Body text                        */
  --gold:        #B8893C;   /* Buttons — warm gold              */

  /* --- Derived tones (kept in-family, no new hues) --- */
  --wood-deep:   #3B2C16;   /* Dark bands, footer               */
  --wood-soft:   #8A6C42;   /* Secondary text on light          */
  --bg-alt:      #F1ECE3;   /* Alternating section background   */
  --beige-pale:  #EFE4D2;
  --gold-bright: #D2A455;
  --green-deep:  #245430;
  --wa:          #25D366;   /* WhatsApp conversation green       */

  --line:        rgba(107, 79, 42, .16);
  --line-strong: rgba(107, 79, 42, .30);
  --line-light:  rgba(248, 246, 242, .26);

  --ink-70:      rgba(34, 34, 34, .72);
  --ink-55:      rgba(34, 34, 34, .56);
  --paper-80:    rgba(248, 246, 242, .82);
  --paper-60:    rgba(248, 246, 242, .62);

  /* --- Type --- */
  --display: "Fraunces", "Iowan Old Style", Georgia, serif;
  --body:    "Plus Jakarta Sans", system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;

  /* Fluid scale */
  --fs-eyebrow: .66rem;
  --fs-small:   .8rem;
  --fs-body:    clamp(.9rem, .87rem + .16vw, .975rem);
  --fs-lead:    clamp(.975rem, .91rem + .34vw, 1.15rem);
  --fs-h3:      clamp(1.05rem, .97rem + .44vw, 1.28rem);
  --fs-h2:      clamp(1.7rem, 1.32rem + 1.85vw, 2.85rem);
  --fs-h1:      clamp(2.1rem, 1.36rem + 3.7vw, 4.25rem);

  /* --- Space --- */
  --gutter:     clamp(1.25rem, 4vw, 2.5rem);
  --section-y:  clamp(3rem, 6vw, 5.5rem);
  --max:        1180px;

  /* --- Shape & depth --- */
  --r-sm: 8px;
  --r-md: 16px;
  --r-lg: 24px;
  --r-pill: 999px;

  --shadow-sm: 0 2px 10px rgba(59, 44, 22, .06);
  --shadow-md: 0 14px 34px -18px rgba(59, 44, 22, .38);
  --shadow-lg: 0 34px 70px -34px rgba(59, 44, 22, .55);

  /* --- Motion --- */
  --ease:  cubic-bezier(.22, .61, .36, 1);
  --ease-out-soft: cubic-bezier(.16, 1, .3, 1);
  --t-fast: .22s;
  --t-mid:  .42s;
  --t-slow: .8s;

  --nav-h: 76px;
}


/* =====================================================================
   02. RESET & BASE
   ===================================================================== */
*, *::before, *::after { box-sizing: border-box; }

html {
  scroll-behavior: smooth;
  -webkit-text-size-adjust: 100%;
}

body {
  margin: 0;
  background: var(--bg);
  color: var(--ink);
  font-family: var(--body);
  font-size: var(--fs-body);
  font-weight: 400;
  line-height: 1.7;
  letter-spacing: .002em;
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

/* Locks scroll while the mobile menu or lightbox is open */
body.is-locked { overflow: hidden; }

img, svg, iframe { display: block; max-width: 100%; }
img { height: auto; }

h1, h2, h3, h4 { margin: 0; font-family: var(--display); font-weight: 400; }
p  { margin: 0 0 1.1em; }
ul { margin: 0; padding: 0; list-style: none; }

a { color: inherit; text-decoration: none; }

button {
  font: inherit;
  color: inherit;
  background: none;
  border: 0;
  cursor: pointer;
}

/* Offset anchor targets so the sticky header never covers a heading */
[id] { scroll-margin-top: calc(var(--nav-h) + 24px); }

/* Visible, on-brand focus ring for keyboard users */
:focus-visible {
  outline: 2px solid var(--gold);
  outline-offset: 3px;
  border-radius: 4px;
}

::selection { background: var(--beige); color: var(--wood-deep); }

.skip-link {
  position: fixed;
  top: 10px; left: 50%;
  transform: translate(-50%, -160%);
  z-index: 2000;
  padding: .7rem 1.2rem;
  background: var(--wood-deep);
  color: var(--bg);
  border-radius: var(--r-pill);
  font-size: var(--fs-small);
  transition: transform var(--t-fast) var(--ease);
}
.skip-link:focus { transform: translate(-50%, 0); }

.visually-hidden {
  position: absolute;
  width: 1px; height: 1px;
  margin: -1px; padding: 0;
  overflow: hidden;
  clip: rect(0 0 0 0);
  white-space: nowrap;
}


/* =====================================================================
   03. TYPOGRAPHY HELPERS
   ===================================================================== */
.eyebrow {
  margin: 0 0 1rem;
  font-size: var(--fs-eyebrow);
  font-weight: 600;
  letter-spacing: .22em;
  text-transform: uppercase;
  color: var(--wood-soft);
}
.eyebrow--light { color: var(--beige); }

.h2 {
  font-size: var(--fs-h2);
  line-height: 1.06;
  letter-spacing: -.022em;
  color: var(--wood-deep);
}
.h2 em {
  font-style: italic;
  font-weight: 300;
  color: var(--wood);
}
.h2--light { color: var(--bg); }
.h2--light em { color: var(--beige); }

.lead {
  font-size: var(--fs-lead);
  line-height: 1.6;
  color: var(--ink-70);
}

/* Checklist with a carved-leaf marker */
.ticks { margin: 1.75rem 0; display: grid; gap: .7rem; }
.ticks li {
  position: relative;
  padding-left: 1.9rem;
  color: var(--ink-70);
}
.ticks li::before {
  content: "";
  position: absolute;
  left: 0; top: .62em;
  width: 10px; height: 10px;
  background: var(--green);
  border-radius: 10px 0 10px 0;   /* leaf shape */
  transform: rotate(-12deg);
}


/* =====================================================================
   04. LAYOUT
   ===================================================================== */
.container {
  width: 100%;
  max-width: var(--max);
  margin-inline: auto;
  padding-inline: var(--gutter);
}
.container--narrow { max-width: 800px; }

.section { padding-block: var(--section-y); }
.section--alt  { background: var(--bg-alt); }
.section--wood {
  background: var(--wood-deep);
  color: var(--paper-80);
  background-image:
    radial-gradient(120% 90% at 12% 0%, rgba(184, 137, 60, .20), transparent 62%),
    radial-gradient(90% 80% at 100% 100%, rgba(47, 107, 59, .28), transparent 60%);
}

.section__head {
  max-width: 32rem;
  margin-inline: auto;
  margin-bottom: clamp(2rem, 4vw, 3.25rem);
  text-align: center;
}
.section__head .rule { justify-content: center; }
.section__head .h2 { font-size: clamp(1.5rem, 1.15rem + 1.6vw, 2.35rem); }

/* Ornamental divider with a carved medallion in the middle */
.rule {
  display: flex;
  align-items: center;
  gap: .9rem;
  margin-top: 1.6rem;
}
.rule span {
  height: 1px;
  flex: 0 0 clamp(36px, 8vw, 76px);
  background: linear-gradient(90deg, transparent, var(--line-strong));
}
.rule span:last-child { background: linear-gradient(90deg, var(--line-strong), transparent); }
.rule svg {
  width: 46px; height: 23px;
  fill: var(--gold);
  stroke: var(--gold);
  stroke-width: 1.4;
  stroke-linecap: round;
}
.rule svg path:last-child { fill: none; }

/* The signature: a band of ukiran (carved fretwork) closing a section */
.ukiran-band {
  position: absolute;
  left: 0; right: 0;
  height: 46px;
  pointer-events: none;
  z-index: 3;
}
.ukiran-band svg { width: 100%; height: 100%; }

/* Hero: flipped, so the solid edge is flush with the cream section below
   and the carved shapes rise up into the photograph. */
.ukiran-band--bottom { bottom: -1px; transform: scaleY(-1); }

/* CTA: unflipped, so the valance hangs down from the section above. */
.ukiran-band--top { top: -1px; }


/* =====================================================================
   05. BUTTONS & LINKS
   ===================================================================== */
.btn {
  --btn-bg: var(--gold);
  --btn-fg: #fff;
  position: relative;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: .6rem;
  padding: .95rem 1.9rem;
  min-height: 50px;
  border: 1px solid transparent;
  border-radius: var(--r-pill);
  background: var(--btn-bg);
  color: var(--btn-fg);
  font-family: var(--body);
  font-size: .95rem;
  font-weight: 600;
  letter-spacing: .01em;
  line-height: 1.2;
  text-align: center;
  cursor: pointer;
  overflow: hidden;
  isolation: isolate;
  transition: transform var(--t-fast) var(--ease),
              box-shadow var(--t-fast) var(--ease),
              background-color var(--t-fast) var(--ease),
              color var(--t-fast) var(--ease),
              border-color var(--t-fast) var(--ease);
}
.btn:hover  { transform: translateY(-2px); box-shadow: var(--shadow-md); }
.btn:active { transform: translateY(0); }

.btn--gold  { --btn-bg: var(--gold);  }
.btn--gold:hover  { background: var(--gold-bright); }
.btn--green { --btn-bg: var(--green); }
.btn--green:hover { background: var(--green-deep); }
.btn--wood  { --btn-bg: var(--wood);  }
.btn--wood:hover  { background: var(--wood-deep); }

.btn--outline-light {
  background: transparent;
  color: #fff;
  border-color: rgba(255, 255, 255, .5);
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
}
.btn--outline-light:hover {
  background: rgba(255, 255, 255, .12);
  border-color: #fff;
}

.btn--text-light {
  background: transparent;
  color: #fff;
  padding-inline: .6rem;
}
.btn--text-light:hover { box-shadow: none; color: var(--beige); }

.btn--sm { padding: .6rem 1.2rem; min-height: 42px; font-size: .85rem; }
.btn--lg { padding: 1.1rem 2.4rem; min-height: 58px; font-size: 1.02rem; }
.btn--block { width: 100%; }

/* Little triangle for the "Watch Gallery" link */
.btn__play {
  width: 30px; height: 30px;
  display: grid; place-items: center;
  border: 1px solid rgba(255, 255, 255, .55);
  border-radius: 50%;
}
.btn__play::after {
  content: "";
  border-left: 7px solid currentColor;
  border-block: 4.5px solid transparent;
  margin-left: 2px;
}

/* Ripple element injected by JS on click */
.ripple {
  position: absolute;
  border-radius: 50%;
  transform: scale(0);
  background: rgba(255, 255, 255, .38);
  pointer-events: none;
  animation: ripple .62s var(--ease-out-soft) forwards;
  z-index: -1;
}
@keyframes ripple { to { transform: scale(2.6); opacity: 0; } }

.link-arrow {
  display: inline-flex;
  align-items: center;
  gap: .55rem;
  font-weight: 600;
  color: var(--wood);
  border-bottom: 1px solid var(--line-strong);
  padding-bottom: .3rem;
  transition: gap var(--t-fast) var(--ease), color var(--t-fast) var(--ease);
}
.link-arrow:hover { gap: 1rem; color: var(--gold); }


/* =====================================================================
   06. PRELOADER
   ===================================================================== */
.preloader {
  position: fixed;
  inset: 0;
  z-index: 3000;
  display: grid;
  place-content: center;
  justify-items: center;
  gap: 1.4rem;
  background: var(--wood-deep);
  transition: opacity .6s var(--ease), visibility .6s var(--ease);
}
.preloader.is-done { opacity: 0; visibility: hidden; }

.preloader__mark img {
  width: 120px; height: auto;
  opacity: 0;
  transform: scale(.85);
  animation: markIn 1s var(--ease-out-soft) forwards;
}
@keyframes markIn { to { opacity: 1; transform: scale(1); } }

.preloader__word {
  margin: 0;
  font-family: var(--display);
  font-size: 1.05rem;
  letter-spacing: .3em;
  text-transform: uppercase;
  color: var(--beige);
  opacity: 0;
  animation: fadeIn .8s var(--ease) .7s forwards;
}
@keyframes fadeIn { to { opacity: .85; } }


/* =====================================================================
   07. NAVIGATION
   ===================================================================== */
.nav {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 1000;
  transition: box-shadow var(--t-mid) var(--ease);
}
.nav__inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  min-height: var(--nav-h);
}

/* Glassmorphism background lives on a pseudo-element (not .nav itself) so its
   backdrop-filter doesn't become a containing block for the fixed mobile menu. */
.nav::before {
  content: "";
  position: absolute;
  inset: 0;
  z-index: -1;
  transition: background-color var(--t-mid) var(--ease), backdrop-filter var(--t-mid) var(--ease);
}

/* Glassmorphism kicks in once the page scrolls */
.nav.is-stuck {
  box-shadow: 0 1px 0 var(--line), 0 10px 30px -22px rgba(59, 44, 22, .6);
}
.nav.is-stuck::before {
  background-color: rgba(248, 246, 242, .72);
  backdrop-filter: blur(18px) saturate(140%);
  -webkit-backdrop-filter: blur(18px) saturate(140%);
}

/* --- Brand --- */
.brand { display: inline-flex; align-items: center; gap: .7rem; }
.brand__mark {
  display: grid; place-items: center;
  flex: none;
  transition: transform var(--t-fast) var(--ease);
}
.brand:hover .brand__mark { transform: rotate(-4deg); }
.brand__mark img { height: 48px; width: auto; object-fit: contain; }
.brand__text { display: grid; line-height: 1.15; }
.brand__name {
  font-family: var(--display);
  font-size: 1.05rem;
  letter-spacing: -.01em;
  color: #fff;
  transition: color var(--t-mid) var(--ease);
}
.brand__sub {
  font-size: .66rem;
  letter-spacing: .18em;
  text-transform: uppercase;
  color: rgba(255, 255, 255, .68);
  transition: color var(--t-mid) var(--ease);
}
.nav.is-stuck .brand__name { color: var(--wood-deep); }
.nav.is-stuck .brand__sub  { color: var(--wood-soft); }

/* --- Menu --- */
.nav__menu { display: flex; align-items: center; gap: 1.6rem; }
.nav__list { display: flex; align-items: center; gap: 1.45rem; }

.nav__link {
  position: relative;
  font-size: .9rem;
  font-weight: 500;
  color: rgba(255, 255, 255, .9);
  padding-block: .3rem;
  transition: color var(--t-fast) var(--ease);
}
.nav__link::after {
  content: "";
  position: absolute;
  left: 0; bottom: 0;
  width: 100%; height: 1.5px;
  background: var(--gold);
  transform: scaleX(0);
  transform-origin: right;
  transition: transform var(--t-fast) var(--ease);
}
.nav__link:hover::after,
.nav__link.is-active::after { transform: scaleX(1); transform-origin: left; }
.nav.is-stuck .nav__link { color: var(--ink-70); }
.nav.is-stuck .nav__link:hover,
.nav.is-stuck .nav__link.is-active { color: var(--wood-deep); }

/* --- Hamburger --- */
.nav__toggle {
  display: none;
  width: 44px; height: 44px;
  place-content: center;
  gap: 5px;
  border-radius: 12px;
}
.nav__bar {
  display: block;
  width: 22px; height: 2px;
  background: #fff;
  border-radius: 2px;
  transition: transform var(--t-fast) var(--ease),
              opacity var(--t-fast) var(--ease),
              background-color var(--t-mid) var(--ease);
}
.nav.is-stuck .nav__bar { background: var(--wood-deep); }
.nav__toggle[aria-expanded="true"] .nav__bar:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.nav__toggle[aria-expanded="true"] .nav__bar:nth-child(2) { opacity: 0; }
.nav__toggle[aria-expanded="true"] .nav__bar:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }


/* =====================================================================
   08. HERO
   ===================================================================== */
.hero {
  position: relative;
  min-height: 100svh;
  display: flex;
  align-items: center;
  padding-block: calc(var(--nav-h) + 2rem) 4.5rem;
  overflow: hidden;
  isolation: isolate;
}

.hero__media {
  position: absolute;
  inset: -8% 0 -8% 0;      /* extra height so parallax never shows a gap */
  z-index: -2;
  will-change: transform;
}
.hero__media img {
  width: 100%; height: 100%;
  object-fit: cover;
  transform: scale(1.06);
  animation: heroZoom 18s var(--ease) forwards;
}
@keyframes heroZoom { to { transform: scale(1); } }

.hero__scrim {
  position: absolute;
  inset: 0;
  z-index: -1;
  background:
    linear-gradient(180deg, rgba(30, 22, 11, .72) 0%, rgba(30, 22, 11, .34) 34%, rgba(30, 22, 11, .78) 100%),
    linear-gradient(96deg, rgba(59, 44, 22, .68) 0%, rgba(59, 44, 22, .12) 62%);
}

.hero__content { position: relative; max-width: 62rem; color: #fff; }
.hero__eyebrow { margin-bottom: 1.4rem; }

.hero__title {
  font-size: var(--fs-h1);
  line-height: 1.02;
  letter-spacing: -.028em;
  margin-bottom: 1.5rem;
  text-wrap: balance;
  text-shadow: 0 2px 30px rgba(0, 0, 0, .3);
}
.hero__title em {
  font-style: italic;
  font-weight: 300;
  color: var(--beige);
}

.hero__lead {
  max-width: 42rem;
  font-size: var(--fs-lead);
  color: rgba(255, 255, 255, .88);
  margin-bottom: 2.4rem;
}

.hero__actions {
  display: flex;
  flex-wrap: wrap;
  gap: .9rem;
  margin-bottom: 3rem;
}

/* --- Booking type picker: gold indicator glides between the two options --- */
.hero__picker {
  position: relative;
  display: inline-flex;
  padding: .35rem;
  border-radius: var(--r-pill);
  background: rgba(255, 255, 255, .12);
  border: 1px solid rgba(255, 255, 255, .3);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
}
.hero__picker-glide {
  position: absolute;
  top: .35rem; bottom: .35rem; left: .35rem;
  width: calc(50% - .35rem);
  border-radius: var(--r-pill);
  background: var(--gold);
  box-shadow: var(--shadow-md);
  transition: transform var(--t-mid) var(--ease-out-soft);
}
.hero__picker:has(.hero__picker-opt:last-child:hover) .hero__picker-glide,
.hero__picker:has(.hero__picker-opt:last-child:focus-visible) .hero__picker-glide {
  transform: translateX(100%);
}

.hero__picker-opt {
  position: relative;
  z-index: 1;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: .55rem;
  min-width: 168px;
  padding: .85rem 1.5rem;
  border-radius: var(--r-pill);
  font-size: .92rem;
  font-weight: 600;
  color: #fff;
  transition: transform var(--t-fast) var(--ease);
}
.hero__picker-opt:active { transform: scale(.97); }

.hero__picker-icon {
  width: 19px; height: 19px;
  flex: none;
  fill: none;
  stroke: currentColor;
  stroke-width: 1.8;
  stroke-linecap: round;
  stroke-linejoin: round;
}

.hero__facts {
  display: flex;
  flex-wrap: wrap;
  gap: clamp(1.5rem, 5vw, 3.5rem);
  padding-top: 1.8rem;
  border-top: 1px solid rgba(255, 255, 255, .22);
  max-width: 34rem;
}
.hero__facts li { display: grid; gap: .1rem; }
.hero__facts strong {
  font-family: var(--display);
  font-size: 1.7rem;
  font-weight: 400;
  color: var(--beige);
}
.hero__facts span {
  font-size: .74rem;
  letter-spacing: .16em;
  text-transform: uppercase;
  color: rgba(255, 255, 255, .68);
}

/* --- Falling leaves (nodes created in JS) --- */
.leaves { position: absolute; inset: 0; z-index: -1; overflow: hidden; }
.leaf {
  position: absolute;
  top: -8%;
  width: 16px; height: 16px;
  background: var(--beige);
  border-radius: 16px 0 16px 0;
  opacity: .0;
  animation: leafFall linear infinite;
}
@keyframes leafFall {
  0%   { transform: translate3d(0, -10vh, 0) rotate(0deg);      opacity: 0; }
  10%  { opacity: .5; }
  90%  { opacity: .4; }
  100% { transform: translate3d(60px, 110vh, 0) rotate(420deg); opacity: 0; }
}

/* --- Scroll cue --- */
.scroll-cue {
  position: absolute;
  left: 50%; bottom: 4.2rem;
  transform: translateX(-50%);
  z-index: 4;
  display: grid;
  justify-items: center;
  gap: .7rem;
  color: rgba(255, 255, 255, .8);
  font-size: .68rem;
  letter-spacing: .24em;
  text-transform: uppercase;
}
.scroll-cue__line {
  width: 1px; height: 54px;
  background: linear-gradient(180deg, transparent, var(--beige));
  position: relative;
  overflow: hidden;
}
.scroll-cue__line::after {
  content: "";
  position: absolute;
  inset: 0;
  background: var(--gold);
  animation: cue 2.2s var(--ease) infinite;
}
@keyframes cue {
  0%   { transform: translateY(-100%); }
  60%  { transform: translateY(100%); }
  100% { transform: translateY(100%); }
}
.scroll-cue:hover { color: #fff; }


/* =====================================================================
   09. ABOUT
   ===================================================================== */
.about__grid {
  display: grid;
  gap: clamp(2.5rem, 6vw, 5rem);
  align-items: center;
}

.about__media { position: relative; }
.about__photo { margin: 0; overflow: hidden; border-radius: var(--r-md); }
.about__photo img {
  width: 100%;
  object-fit: cover;
  transition: transform 1.1s var(--ease-out-soft);
}
.about__photo:hover img { transform: scale(1.05); }
.about__photo--tall { aspect-ratio: 1 / 1; box-shadow: var(--shadow-lg); }

.about__body .h2 { margin-bottom: 1.5rem; }


/* =====================================================================
   10. SERVICES CARDS
   ===================================================================== */
.services__grid {
  display: grid;
  gap: clamp(1.5rem, 3vw, 2.25rem);
}

.scard {
  display: flex;
  flex-direction: column;
  background:
    linear-gradient(rgba(248, 246, 242, .9), rgba(248, 246, 242, .9)),
    url('{{ asset('images/bgMS.jpg') }}') center / cover no-repeat;
  border: 1px solid var(--line);
  border-radius: var(--r-lg);
  overflow: hidden;
  box-shadow: var(--shadow-sm);
  transition: transform var(--t-mid) var(--ease),
              box-shadow var(--t-mid) var(--ease),
              border-color var(--t-mid) var(--ease);
}
.scard:hover {
  transform: translateY(-8px);
  border-color: var(--line-strong);
  box-shadow: var(--shadow-lg);
}

.scard__media { position: relative; aspect-ratio: 16 / 10; overflow: hidden; }
.scard__media img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform 1s var(--ease-out-soft);
}
.scard:hover .scard__media img { transform: scale(1.07); }

.scard__tag {
  position: absolute;
  left: 1rem; bottom: 1rem;
  padding: .45rem 1rem;
  border-radius: var(--r-pill);
  background: rgba(248, 246, 242, .82);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  color: var(--wood-deep);
  font-size: .74rem;
  font-weight: 600;
  letter-spacing: .08em;
  text-transform: uppercase;
}

.scard__body {
  display: flex;
  flex-direction: column;
  flex: 1;
  padding: clamp(1.6rem, 3vw, 2.4rem);
}
.scard__title {
  display: flex;
  align-items: center;
  gap: .6rem;
  font-size: var(--fs-h3);
  color: var(--wood-deep);
  margin-bottom: .8rem;
}
.scard__icon { font-size: 1.1em; }
.scard__body > p { color: var(--ink-70); }

.feature-list {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: .5rem 1rem;
  margin: 1.3rem 0 2rem;
  padding-top: 1.3rem;
  border-top: 1px solid var(--line);
}
.feature-list li {
  position: relative;
  padding-left: 1.15rem;
  font-size: var(--fs-small);
  color: var(--ink-70);
}
.feature-list li::before {
  content: "";
  position: absolute;
  left: 0; top: .62em;
  width: 6px; height: 6px;
  background: var(--gold);
  border-radius: 6px 0 6px 0;
  transform: rotate(-12deg);
}
.scard .btn { margin-top: auto; }


/* =====================================================================
   11. WHY CHOOSE US
   ===================================================================== */
.why__grid {
  display: grid;
  gap: clamp(1.4rem, 3vw, 2rem);
}
.why__item {
  padding: clamp(1.5rem, 3vw, 2rem);
  background:
    linear-gradient(rgba(248, 246, 242, .9), rgba(248, 246, 242, .9)),
    url('{{ asset('images/bgMS.jpg') }}') center / cover no-repeat;
  border: 1px solid var(--line);
  border-radius: var(--r-md);
  transition: transform var(--t-mid) var(--ease),
              box-shadow var(--t-mid) var(--ease);
}
.why__item:hover {
  transform: translateY(-6px);
  box-shadow: var(--shadow-md);
}
.why__icon {
  display: grid;
  place-items: center;
  width: 48px; height: 48px;
  margin-bottom: 1.15rem;
  border-radius: 14px;
  background: var(--beige-pale);
  transition: background-color var(--t-mid) var(--ease);
}
.why__item:hover .why__icon { background: var(--beige); }
.why__icon svg {
  width: 24px; height: 24px;
  fill: none;
  stroke: var(--wood);
  stroke-width: 1.6;
  stroke-linecap: round;
  stroke-linejoin: round;
}
.why__item h3 {
  font-size: 1.08rem;
  color: var(--wood-deep);
  margin-bottom: .45rem;
}
.why__item p {
  margin: 0;
  font-size: var(--fs-small);
  color: var(--ink-55);
  line-height: 1.65;
}


/* =====================================================================
   12. ACCOMMODATION (wood band)
   ===================================================================== */
.acc__head {
  display: grid;
  gap: 1.6rem;
  margin-bottom: clamp(2.5rem, 5vw, 4rem);
}
.acc__note {
  margin: 0;
  color: var(--paper-60);
  max-width: 30rem;
  align-self: end;
}

.acc__stats {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 2rem 1rem;
  padding-block: clamp(2rem, 4vw, 3rem);
  border-block: 1px solid var(--line-light);
}
.acc__stats li { display: grid; gap: .35rem; text-align: center; justify-items: center; }
.acc__stats strong {
  font-family: var(--display);
  font-size: clamp(2.2rem, 5vw, 3.4rem);
  font-weight: 300;
  line-height: 1;
  color: var(--gold-bright);
  font-variant-numeric: tabular-nums;
}
.acc__stats span {
  font-size: .72rem;
  letter-spacing: .17em;
  text-transform: uppercase;
  color: var(--paper-60);
}

.amenities {
  display: flex;
  flex-wrap: wrap;
  gap: .65rem;
  margin-top: clamp(2rem, 4vw, 3rem);
}
.amenities li {
  padding: .6rem 1.15rem;
  border: 1px solid var(--line-light);
  border-radius: var(--r-pill);
  font-size: var(--fs-small);
  color: var(--paper-80);
  transition: background-color var(--t-fast) var(--ease),
              border-color var(--t-fast) var(--ease);
}
.amenities li:hover {
  background: rgba(248, 246, 242, .1);
  border-color: var(--beige);
}


/* =====================================================================
   13. GALLERY
   ===================================================================== */
.filters {
  display: flex;
  flex-wrap: wrap;
  gap: .5rem;
  margin-bottom: 2.2rem;
}
.filter {
  padding: .55rem 1.1rem;
  border: 1px solid var(--line);
  border-radius: var(--r-pill);
  font-size: .82rem;
  font-weight: 500;
  color: var(--ink-70);
  transition: background-color var(--t-fast) var(--ease),
              color var(--t-fast) var(--ease),
              border-color var(--t-fast) var(--ease);
}
.filter:hover { border-color: var(--wood); color: var(--wood-deep); }
.filter.is-active {
  background: var(--wood);
  border-color: var(--wood);
  color: var(--bg);
}

/* CSS-columns masonry — no library, reflows naturally */
.masonry { column-count: 1; column-gap: 1rem; }

.gitem {
  position: relative;
  display: block;
  width: 100%;
  margin: 0 0 1rem;
  padding: 0;
  border-radius: var(--r-md);
  overflow: hidden;
  break-inside: avoid;
  background: var(--beige-pale);
  transition: opacity var(--t-mid) var(--ease), transform var(--t-mid) var(--ease);
}
.gitem img {
  width: 100%;
  transition: transform .9s var(--ease-out-soft), filter var(--t-mid) var(--ease);
}
.gitem:hover img { transform: scale(1.06); }

.gitem::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, transparent 45%, rgba(30, 22, 11, .78));
  opacity: 0;
  transition: opacity var(--t-mid) var(--ease);
}
.gitem:hover::after,
.gitem:focus-visible::after { opacity: 1; }

.gitem__cap {
  position: absolute;
  left: 1.1rem; bottom: 1rem;
  z-index: 2;
  color: #fff;
  font-size: .8rem;
  font-weight: 600;
  letter-spacing: .06em;
  text-align: left;
  opacity: 0;
  transform: translateY(8px);
  transition: opacity var(--t-mid) var(--ease), transform var(--t-mid) var(--ease);
}
.gitem:hover .gitem__cap,
.gitem:focus-visible .gitem__cap { opacity: 1; transform: translateY(0); }

/* Hidden by the filter */
.gitem.is-hidden { display: none; }

.gallery__empty {
  text-align: center;
  color: var(--ink-55);
  padding-block: 2rem;
}

/* --- Lightbox --- */
.lightbox {
  position: fixed;
  inset: 0;
  z-index: 2500;
  display: grid;
  place-items: center;
  padding: clamp(1rem, 4vw, 3rem);
  background: rgba(24, 18, 9, .92);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  opacity: 0;
  transition: opacity var(--t-mid) var(--ease);
}
.lightbox.is-open { opacity: 1; }
.lightbox[hidden] { display: none; }

.lightbox__figure {
  margin: 0;
  max-width: min(1100px, 100%);
  display: grid;
  gap: 1rem;
  justify-items: center;
}
.lightbox__figure img {
  max-height: 76svh;
  width: auto;
  border-radius: var(--r-md);
  box-shadow: 0 40px 90px -40px #000;
  transform: scale(.96);
  opacity: 0;
  transition: transform var(--t-mid) var(--ease-out-soft), opacity var(--t-mid) var(--ease);
}
.lightbox.is-open .lightbox__figure img { transform: scale(1); opacity: 1; }

.lightbox__figure figcaption {
  color: var(--paper-80);
  font-size: var(--fs-small);
  letter-spacing: .04em;
  text-align: center;
}

.lightbox__close,
.lightbox__nav {
  position: absolute;
  display: grid;
  place-items: center;
  width: 50px; height: 50px;
  border-radius: 50%;
  background: rgba(255, 255, 255, .1);
  border: 1px solid rgba(255, 255, 255, .22);
  color: #fff;
  font-size: 1.7rem;
  line-height: 1;
  transition: background-color var(--t-fast) var(--ease), transform var(--t-fast) var(--ease);
}
.lightbox__close:hover,
.lightbox__nav:hover { background: rgba(255, 255, 255, .22); transform: scale(1.06); }
.lightbox__close { top: 1.2rem; right: 1.2rem; }
.lightbox__nav--prev { left: 1rem;  top: 50%; margin-top: -25px; }
.lightbox__nav--next { right: 1rem; top: 50%; margin-top: -25px; }


/* =====================================================================
   13b. MODAL TEMPAHAN
   ===================================================================== */
.booking-modal {
  position: fixed;
  inset: 0;
  z-index: 2600;
  display: grid;
  place-items: center;
  padding: clamp(1rem, 4vw, 3rem);
  background: rgba(24, 18, 9, .72);
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
  opacity: 0;
  transition: opacity var(--t-mid) var(--ease);
}
.booking-modal.is-open { opacity: 1; }
.booking-modal[hidden] { display: none; }

.booking-modal__panel {
  width: min(460px, 100%);
  max-height: 90svh;
  overflow-y: auto;
  padding: clamp(1.75rem, 4vw, 2.5rem);
  background: var(--bg);
  border-radius: var(--r-lg);
  box-shadow: var(--shadow-lg);
  position: relative;
  transform: scale(.96) translateY(10px);
  opacity: 0;
  transition: transform var(--t-mid) var(--ease-out-soft), opacity var(--t-mid) var(--ease);
}
.booking-modal.is-open .booking-modal__panel { transform: scale(1) translateY(0); opacity: 1; }

.booking-modal__close {
  position: absolute;
  top: 1rem; right: 1rem;
  width: 38px; height: 38px;
  display: grid; place-items: center;
  border-radius: 50%;
  background: var(--bg-alt);
  color: var(--wood-deep);
  font-size: 1.4rem;
  line-height: 1;
  transition: background-color var(--t-fast) var(--ease);
}
.booking-modal__close:hover { background: var(--beige); }

.booking-modal__title {
  font-family: var(--display);
  font-size: 1.4rem;
  color: var(--wood-deep);
  margin: 0 0 .5rem;
  padding-right: 2rem;
}
.booking-modal__note {
  margin: 0 0 1.6rem;
  font-size: var(--fs-small);
  color: var(--ink-70);
}

.booking-form { display: grid; gap: 1.2rem; }
.booking-form__field { display: grid; gap: .4rem; }
.booking-form__field label,
.booking-form__label {
  font-size: .78rem;
  font-weight: 600;
  letter-spacing: .04em;
  text-transform: uppercase;
  color: var(--wood-soft);
}
.booking-form__row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

.booking-form input[type="text"],
.booking-form input[type="date"] {
  width: 100%;
  padding: .75rem 1rem;
  border: 1px solid var(--line-strong);
  border-radius: var(--r-sm);
  background: #fff;
  font: inherit;
  font-size: var(--fs-small);
  color: var(--ink);
  transition: border-color var(--t-fast) var(--ease);
}
.booking-form input:focus-visible { border-color: var(--gold); }

.booking-form__radios { display: flex; gap: .75rem; }
.booking-radio {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: .5rem;
  padding: .7rem 1rem;
  border: 1px solid var(--line-strong);
  border-radius: var(--r-sm);
  font-size: var(--fs-small);
  color: var(--ink-70);
  cursor: pointer;
  transition: border-color var(--t-fast) var(--ease), background-color var(--t-fast) var(--ease);
}
.booking-radio input { accent-color: var(--gold); }
.booking-radio:has(input:checked) {
  border-color: var(--gold);
  background: var(--beige-pale);
  color: var(--wood-deep);
}


/* =====================================================================
   14. EVENT BANNER
   ===================================================================== */
.event {
  position: relative;
  padding-block: clamp(3.25rem, 7vw, 6rem);
  overflow: hidden;
  isolation: isolate;
  color: #fff;
}
.event__media { position: absolute; inset: 0; z-index: -2; }
.event__media img { width: 100%; height: 100%; object-fit: cover; }
.event__scrim {
  position: absolute;
  inset: 0;
  z-index: -1;
  background:
    linear-gradient(100deg, rgba(59, 44, 22, .93) 0%, rgba(59, 44, 22, .72) 46%, rgba(36, 84, 48, .55) 100%);
}
.event__content { max-width: 44rem; text-align: left; }
.event__content .h2 { margin-bottom: 1.3rem; }
.event__lead {
  font-size: var(--fs-lead);
  color: rgba(255, 255, 255, .86);
  margin-bottom: 2rem;
}

.pills { display: flex; flex-wrap: wrap; gap: .6rem; margin-bottom: 2.4rem; }
.pills li {
  padding: .55rem 1.15rem;
  border-radius: var(--r-pill);
  background: rgba(255, 255, 255, .1);
  border: 1px solid rgba(255, 255, 255, .2);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  font-size: var(--fs-small);
  transition: background-color var(--t-fast) var(--ease), transform var(--t-fast) var(--ease);
}
.pills li:hover { background: rgba(255, 255, 255, .2); transform: translateY(-2px); }

.event__actions { display: flex; flex-wrap: wrap; gap: .9rem; }


/* =====================================================================
   15. TESTIMONIALS
   ===================================================================== */
.tgrid { display: grid; gap: clamp(1.25rem, 3vw, 2rem); }

.tcard {
  margin: 0;
  padding: clamp(1.75rem, 3vw, 2.4rem);
  background:
    linear-gradient(rgba(248, 246, 242, .9), rgba(248, 246, 242, .9)),
    url('{{ asset('images/bgMS.jpg') }}') center / cover no-repeat;
  border: 1px solid var(--line);
  border-radius: var(--r-lg);
  box-shadow: var(--shadow-sm);
  display: flex;
  flex-direction: column;
  transition: transform var(--t-mid) var(--ease), box-shadow var(--t-mid) var(--ease);
}
.tcard:hover { transform: translateY(-6px); box-shadow: var(--shadow-md); }

.tcard__stars { color: var(--gold); letter-spacing: .18em; font-size: .95rem; margin-bottom: 1rem; }

.tcard blockquote { margin: 0 0 1.6rem; }
.tcard blockquote p {
  margin: 0;
  font-family: var(--display);
  font-size: 1.14rem;
  line-height: 1.55;
  color: var(--wood-deep);
}
.tcard blockquote p::before { content: "\201C"; }
.tcard blockquote p::after  { content: "\201D"; }

.tcard figcaption {
  display: flex;
  align-items: center;
  gap: .85rem;
  margin-top: auto;
  padding-top: 1.3rem;
  border-top: 1px solid var(--line);
}
.tcard__avatar {
  display: grid;
  place-items: center;
  width: 42px; height: 42px;
  flex: none;
  border-radius: 50%;
  background: var(--beige-pale);
  color: var(--wood);
  font-size: .8rem;
  font-weight: 700;
  letter-spacing: .04em;
}
.tcard figcaption > span:last-child { display: grid; }
.tcard figcaption strong { font-size: .95rem; color: var(--wood-deep); font-weight: 600; }
.tcard figcaption small { font-size: .78rem; color: var(--ink-55); }


/* =====================================================================
   16. LOCATION
   ===================================================================== */
.location__grid { display: grid; gap: clamp(1.5rem, 3vw, 2.5rem); }

.location__map {
  position: relative;
  border-radius: var(--r-lg);
  overflow: hidden;
  border: 7px solid var(--bg);
  outline: 1px solid var(--line-strong);
  outline-offset: -1px;
  box-shadow: var(--shadow-lg);
  min-height: 340px;
  background: var(--beige-pale);
}
.location__map iframe { width: 100%; height: 100%; min-height: 340px; border: 0; display: block; }

.location__map-photo {
  position: absolute;
  left: 1.1rem; bottom: 1.1rem;
  z-index: 2;
  width: 92px; height: 92px;
  border-radius: var(--r-md);
  overflow: hidden;
  border: 4px solid var(--bg);
  box-shadow: var(--shadow-md);
  transform: rotate(-5deg);
  transition: transform var(--t-mid) var(--ease);
}
.location__map:hover .location__map-photo { transform: rotate(0deg) scale(1.06); }
.location__map-photo img { width: 100%; height: 100%; object-fit: cover; }

.location__map-pin {
  position: absolute;
  top: 1.1rem; right: 1.1rem;
  z-index: 2;
  width: 46px; height: 46px;
  display: grid;
  place-items: center;
  border-radius: 50%;
  background: var(--wood-deep);
  box-shadow: var(--shadow-md);
}
.location__map-pin svg { width: 22px; height: 22px; fill: var(--gold-bright); }

.location__nearby-label {
  font-size: .72rem;
  font-weight: 700;
  letter-spacing: .2em;
  text-transform: uppercase;
  color: var(--wood-soft);
  margin: 0 0 1rem;
}

.nearby__grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: .9rem;
}

.nearby__card {
  position: relative;
  overflow: hidden;
  min-height: 168px;
  padding: 1.15rem;
  border: 1px solid var(--line);
  border-radius: var(--r-md);
  background-size: cover;
  background-position: center;
  transition: transform var(--t-mid) var(--ease),
              box-shadow var(--t-mid) var(--ease),
              border-color var(--t-mid) var(--ease);
}
/* Dark scrim over the photo so the icon/heading/text stay legible */
.nearby__card::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(190deg, rgba(30, 22, 11, .28) 0%, rgba(30, 22, 11, .86) 100%);
}
.nearby__card > * { position: relative; z-index: 1; }

.nearby__card--beach     { background-image: url('{{ asset('images/pantai-bagan-nakhoda-omar.jpg') }}'); }
.nearby__card--museum    { background-image: url('{{ asset('images/muzium-sabak-bernam.jpg') }}'); }
.nearby__card--waterfront { background-image: url('{{ asset('images/waterfront-sabak-bernam.jpg') }}'); }
.nearby__card--fireflies { background-image: url('{{ asset('images/kelip-kelip-kuala-selangor.jpg') }}'); }

.nearby__card:hover {
  transform: translateY(-5px);
  border-color: var(--line-strong);
  box-shadow: var(--shadow-md);
}
.nearby__card h4 {
  font-family: var(--display);
  font-size: 1rem;
  font-weight: 400;
  color: #fff;
  margin: 0 0 .4rem;
}
.nearby__card p {
  margin: 0;
  font-size: .78rem;
  line-height: 1.55;
  color: rgba(255, 255, 255, .82);
}

.nearby__icon {
  display: grid;
  place-items: center;
  width: 38px; height: 38px;
  margin-bottom: .8rem;
  border-radius: 10px;
  background: rgba(255, 255, 255, .16);
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
  transition: background-color var(--t-mid) var(--ease), transform var(--t-mid) var(--ease);
}
.nearby__card:hover .nearby__icon { background: rgba(255, 255, 255, .28); transform: rotate(-4deg); }
.nearby__icon svg {
  width: 19px; height: 19px;
  fill: none;
  stroke: #fff;
  stroke-width: 1.8;
  stroke-linecap: round;
  stroke-linejoin: round;
}


/* =====================================================================
   17. FAQ ACCORDION
   ===================================================================== */
.acc { border-top: 1px solid var(--line); }
.acc__item { border-bottom: 1px solid var(--line); }
.acc__item h3 { margin: 0; font-family: var(--body); }

.acc__btn {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1.5rem;
  width: 100%;
  padding: 1.4rem 0;
  text-align: left;
  font-size: 1.02rem;
  font-weight: 600;
  color: var(--wood-deep);
  transition: color var(--t-fast) var(--ease);
}
.acc__btn:hover { color: var(--gold); }

.acc__sign {
  position: relative;
  flex: none;
  width: 30px; height: 30px;
  border: 1px solid var(--line-strong);
  border-radius: 50%;
  transition: background-color var(--t-fast) var(--ease),
              border-color var(--t-fast) var(--ease),
              transform var(--t-mid) var(--ease);
}
.acc__sign::before,
.acc__sign::after {
  content: "";
  position: absolute;
  top: 50%; left: 50%;
  width: 11px; height: 1.5px;
  background: var(--wood);
  transform: translate(-50%, -50%);
  transition: transform var(--t-mid) var(--ease), background-color var(--t-fast) var(--ease);
}
.acc__sign::after { transform: translate(-50%, -50%) rotate(90deg); }

.acc__btn[aria-expanded="true"] .acc__sign {
  background: var(--gold);
  border-color: var(--gold);
  transform: rotate(180deg);
}
.acc__btn[aria-expanded="true"] .acc__sign::before,
.acc__btn[aria-expanded="true"] .acc__sign::after { background: #fff; }
.acc__btn[aria-expanded="true"] .acc__sign::after { transform: translate(-50%, -50%) rotate(0deg); }

/* Height is animated from JS via inline max-height.
   The collapsed state only applies once <html> has the .js class, so a
   visitor without JavaScript still reads every answer. */
.acc__panel { overflow: hidden; }
.js .acc__panel {
  max-height: 0;
  visibility: hidden;
  transition: max-height var(--t-mid) var(--ease),
              visibility 0s linear var(--t-mid);
}
.js .acc__panel.is-open {
  visibility: visible;
  transition: max-height var(--t-mid) var(--ease), visibility 0s;
}
.acc__panel p {
  margin: 0;
  padding: 0 0 1.5rem;
  max-width: 60ch;
  color: var(--ink-70);
}


/* =====================================================================
   18. CONTACT CTA
   ===================================================================== */
.cta {
  position: relative;
  padding-block: clamp(3.25rem, 6.5vw, 5.5rem);
  text-align: center;
  color: #fff;
  background:
    radial-gradient(120% 100% at 50% 0%, rgba(184, 137, 60, .34), transparent 60%),
    linear-gradient(160deg, var(--wood) 0%, var(--wood-deep) 62%, var(--green-deep) 100%);
}
.cta__inner { max-width: 44rem; margin-inline: auto; }
.cta__title {
  font-size: clamp(2rem, 1.4rem + 2.6vw, 3.4rem);
  line-height: 1.08;
  letter-spacing: -.022em;
  margin-bottom: 1.2rem;
  text-wrap: balance;
}
.cta__lead {
  font-size: var(--fs-lead);
  color: rgba(255, 255, 255, .84);
  margin-bottom: 2.2rem;
}
.cta__actions {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: .9rem;
  margin-bottom: 2rem;
}
.cta__fine {
  margin: 0;
  font-size: .78rem;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: rgba(255, 255, 255, .6);
}


/* =====================================================================
   19. FOOTER
   ===================================================================== */
.footer {
  background: var(--wood-deep);
  color: var(--paper-60);
  padding-top: clamp(2.25rem, 4.5vw, 3.5rem);
}
.footer__grid {
  display: grid;
  gap: 2.5rem;
  padding-bottom: clamp(1.75rem, 3.5vw, 2.75rem);
}
.brand--footer { margin-bottom: 1.2rem; }
.brand--footer .brand__name { color: var(--bg); }
.brand--footer .brand__sub  { color: var(--paper-60); }

.footer__blurb { max-width: 32ch; font-size: var(--fs-small); line-height: 1.75; }

.footer__head {
  font-family: var(--body);
  font-size: .72rem;
  font-weight: 700;
  letter-spacing: .2em;
  text-transform: uppercase;
  color: var(--beige);
  margin-bottom: 1.1rem;
}
.footer__col ul { display: grid; gap: .6rem; }
.footer__col a,
.footer__col span { font-size: var(--fs-small); transition: color var(--t-fast) var(--ease); }
.footer__col a:hover { color: var(--gold-bright); }

.footer__bar {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: .5rem 1.5rem;
  padding-block: 1rem;
  border-top: 1px solid var(--line-light);
  font-size: .78rem;
}
.footer__bar p { margin: 0; }


/* =====================================================================
   20. FLOATING ACTION BUTTONS
   ===================================================================== */
.fab {
  position: fixed;
  z-index: 1200;
  display: inline-flex;
  align-items: center;
  gap: .6rem;
  border-radius: var(--r-pill);
  box-shadow: 0 14px 30px -12px rgba(0, 0, 0, .45);
  transition: transform var(--t-fast) var(--ease),
              box-shadow var(--t-fast) var(--ease),
              opacity var(--t-mid) var(--ease),
              visibility var(--t-mid) var(--ease);
}
.fab:hover { transform: translateY(-3px) scale(1.03); }

.fab--wa {
  right: clamp(1rem, 3vw, 1.75rem);
  bottom: clamp(1rem, 3vw, 1.75rem);
  padding: .85rem 1.35rem .85rem .95rem;
  background: var(--wa);
  color: #fff;
  font-size: .9rem;
  font-weight: 600;
}
.fab--wa svg { width: 26px; height: 26px; fill: currentColor; flex: none; }

/* A gentle pulse ring — draws the eye without shouting */
.fab--wa::before {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: inherit;
  border: 2px solid var(--wa);
  animation: pulse 2.6s var(--ease) infinite;
  pointer-events: none;
}
@keyframes pulse {
  0%   { transform: scale(1);    opacity: .7; }
  70%  { transform: scale(1.16); opacity: 0; }
  100% { transform: scale(1.16); opacity: 0; }
}

.fab--top {
  right: clamp(1rem, 3vw, 1.75rem);
  bottom: calc(clamp(1rem, 3vw, 1.75rem) + 66px);
  width: 46px; height: 46px;
  justify-content: center;
  background: var(--wood-deep);
  color: var(--beige);
  opacity: 0;
  visibility: hidden;
}
.fab--top.is-visible { opacity: 1; visibility: visible; }
.fab--top svg {
  width: 20px; height: 20px;
  fill: none; stroke: currentColor;
  stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round;
}


/* =====================================================================
   21. REVEAL ANIMATIONS (driven by IntersectionObserver)
   ===================================================================== */
[data-reveal] {
  opacity: 0;
  transform: translateY(28px);
  transition: opacity .85s var(--ease-out-soft), transform .85s var(--ease-out-soft);
  transition-delay: calc(var(--reveal-delay, 0) * 110ms);
}
[data-reveal].is-in { opacity: 1; transform: none; }

/* Gallery tiles get a subtle zoom-in instead of a slide */
.gitem[data-reveal] { transform: scale(.96); }


/* =====================================================================
   22. MOVING CAROUSEL ("A Glimpse")
   A strip of images drifting continuously from left to right.
   The track is duplicated by JS, so the -50% -> 0 transition loops seamlessly.
   ===================================================================== */
.marquee-sec {
  padding-block: clamp(3rem, 6vw, 5rem);
  overflow: hidden;
}
.marquee-head { margin-bottom: clamp(1.5rem, 3vw, 2.25rem); }
.marquee-title { max-width: 20ch; }

.marquee {
  overflow: hidden;
  /* Soften both edges so the images appear to fade in and out */
  -webkit-mask-image: linear-gradient(90deg, transparent 0, #000 7%, #000 93%, transparent 100%);
          mask-image: linear-gradient(90deg, transparent 0, #000 7%, #000 93%, transparent 100%);
}

.marquee__track {
  display: flex;
  gap: clamp(.75rem, 1.5vw, 1.25rem);
  width: max-content;
  animation: marquee-ltr 60s linear infinite;
}

/* From -50% to 0 = moves to the right */
@keyframes marquee-ltr {
  from { transform: translate3d(-50%, 0, 0); }
  to   { transform: translate3d(0, 0, 0); }
}

/* Pauses on mouse hover or when any slide is focused */
.marquee:hover .marquee__track,
.marquee:focus-within .marquee__track { animation-play-state: paused; }

.cslide {
  position: relative;
  flex: none;
  width: clamp(200px, 26vw, 300px);
  aspect-ratio: 3 / 4;
  padding: 0;
  border-radius: var(--r-md);
  overflow: hidden;
  background: var(--beige-pale);
  box-shadow: var(--shadow-sm);
  transition: transform var(--t-mid) var(--ease), box-shadow var(--t-mid) var(--ease);
}
.cslide:hover { transform: translateY(-6px); box-shadow: var(--shadow-md); }

.cslide img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform 1s var(--ease-out-soft);
}
.cslide:hover img { transform: scale(1.07); }

.cslide::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, transparent 48%, rgba(30, 22, 11, .8));
}

.cslide__cap {
  position: absolute;
  left: 1rem; bottom: .9rem;
  z-index: 2;
  color: #fff;
  font-size: .82rem;
  font-weight: 600;
  letter-spacing: .04em;
  text-align: left;
}


/* =====================================================================
   23. PANTUN (traditional verse block in the call-to-action section)
   ===================================================================== */
.pantun {
  position: relative;
  display: inline-block;
  margin: 0 auto 2rem;
  padding: 1.5rem clamp(1.5rem, 4vw, 2.75rem);
  border-top: 1px solid rgba(255, 255, 255, .22);
  border-bottom: 1px solid rgba(255, 255, 255, .22);
  font-family: var(--display);
  font-style: italic;
  font-weight: 300;
  font-size: clamp(1rem, .95rem + .35vw, 1.2rem);
  line-height: 2;
  color: var(--beige);
}


/* =====================================================================
   24. RESPONSIVE BREAKPOINTS  (mobile first)
   ===================================================================== */

/* ---- Small tablets ---- */
@media (min-width: 560px) {
  .masonry { column-count: 2; }
}

/* ---- Tablets ---- */
@media (min-width: 768px) {
  .why__grid    { grid-template-columns: repeat(2, minmax(0, 1fr)); }
  .acc__stats   { grid-template-columns: repeat(4, minmax(0, 1fr)); }
  .tgrid        { grid-template-columns: repeat(2, minmax(0, 1fr)); }
  .services__grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
  .acc__head    { grid-template-columns: 1.35fr 1fr; align-items: end; }
  .footer__grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
}

/* ---- Small desktops ---- */
@media (min-width: 960px) {
  .about__grid    { grid-template-columns: 1fr 1.05fr; }
  .location__grid { grid-template-columns: 1.25fr 1fr; }
  .masonry        { column-count: 3; column-gap: 1.25rem; }
  .gitem          { margin-bottom: 1.25rem; }
  .tgrid          { grid-template-columns: repeat(3, minmax(0, 1fr)); }
  .footer__grid   { grid-template-columns: 1.6fr 1fr; gap: 3rem; }
  .why__grid      { grid-template-columns: repeat(4, minmax(0, 1fr)); }
}

/* ---- Mobile navigation (below 960px the menu becomes a drawer) ---- */
@media (max-width: 959px) {
  .nav__toggle { display: grid; }

  .nav__menu {
    position: fixed;
    inset: 0 0 0 auto;
    width: min(340px, 84vw);
    flex-direction: column;
    align-items: stretch;
    justify-content: center;
    gap: 2rem;
    padding: 5rem 2rem 2rem;
    background: rgba(59, 44, 22, .94);
    backdrop-filter: blur(20px) saturate(140%);
    -webkit-backdrop-filter: blur(20px) saturate(140%);
    transform: translateX(100%);
    visibility: hidden;
    transition: transform var(--t-mid) var(--ease-out-soft), visibility var(--t-mid);
  }
  .nav__menu.is-open { transform: translateX(0); visibility: visible; }

  .nav__list { flex-direction: column; align-items: stretch; gap: .25rem; }
  .nav__link {
    display: block;
    padding: .8rem 0;
    font-size: 1.06rem;
    color: rgba(255, 255, 255, .88);
    border-bottom: 1px solid rgba(255, 255, 255, .1);
  }
  .nav.is-stuck .nav__link { color: rgba(255, 255, 255, .88); }
  .nav.is-stuck .nav__link:hover,
  .nav.is-stuck .nav__link.is-active { color: #fff; }
  .nav__link::after { display: none; }
  .nav__cta { align-self: stretch; }
}

/* ---- Fine-tuning for phones ---- */
@media (max-width: 559px) {
  .hero { padding-bottom: 8rem; }
  .hero__picker { width: 100%; }
  .hero__picker-opt { min-width: 0; flex: 1; padding-inline: 1rem; font-size: .85rem; }
  .scroll-cue { bottom: 3.4rem; }
  .scroll-cue__line { height: 40px; }
  .feature-list { grid-template-columns: 1fr; }
  .fab--wa .fab__label { display: none; }
  .fab--wa { padding: .9rem; }
  .cslide { width: 62vw; }
  .lightbox__nav { width: 42px; height: 42px; }
  .cta__actions .btn { flex: 1 1 100%; }
}

/* ---- Large screens: a touch more air ---- */
@media (min-width: 1440px) {
  :root { --max: 1260px; }
}


/* =====================================================================
   25. REDUCED MOTION & PRINT
   ===================================================================== */
@media (prefers-reduced-motion: reduce) {
  html { scroll-behavior: auto; }

  *, *::before, *::after {
    animation-duration: .001ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: .001ms !important;
    scroll-behavior: auto !important;
  }
  [data-reveal] { opacity: 1; transform: none; }
  .leaves { display: none; }
  .hero__media { inset: 0; }

  /* Carousel becomes a self-scrollable strip */
  .marquee { overflow-x: auto; -webkit-mask-image: none; mask-image: none; }
  .marquee__track { animation: none; transform: none; }
}

@media print {
  .nav, .fab, .preloader, .scroll-cue, .leaves, .lightbox, .filters { display: none !important; }
  body { background: #fff; color: #000; }
  .section--wood, .cta, .event, .footer { background: #fff !important; color: #000 !important; }
  [data-reveal] { opacity: 1 !important; transform: none !important; }
}

  </style>

  <!-- Marks that JavaScript is available, before the first paint. -->
  <script>document.documentElement.classList.add('js');</script>

  <!-- Favicon: a roof-gable silhouette (carved roof gable of a Malay house) -->
  <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Crect width='32' height='32' rx='6' fill='%236B4F2A'/%3E%3Cpath d='M16 6 4 16h3v10h18V16h3L16 6Zm0 6 6 5v7H10v-7l6-5Z' fill='%23D8C3A5'/%3E%3C/svg%3E">

  <!-- ============== Structured data (rich results) ============== -->
  <script type="application/ld+json">
  @verbatim
  {
    "@context": "https://schema.org",
    "@type": "LodgingBusiness",
    "name": "Teratak Moro Seneng",
    "description": "Traditional Malay homestay and event venue in Batu 38, Sabak Bernam, Selangor.",
    "url": "https://homestaymoroseneng.pages.dev/",
    "image": "https://homestaymoroseneng.pages.dev/images/moroseneng5.jpeg",
    "telephone": "+60123456789",
    "priceRange": "$$",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Batu 38",
      "addressLocality": "Sabak Bernam",
      "addressRegion": "Selangor",
      "addressCountry": "MY"
    },
    "amenityFeature": [
      { "@type": "LocationFeatureSpecification", "name": "Free parking", "value": true },
      { "@type": "LocationFeatureSpecification", "name": "WiFi", "value": true },
      { "@type": "LocationFeatureSpecification", "name": "Air conditioning", "value": true },
      { "@type": "LocationFeatureSpecification", "name": "Prayer room", "value": true },
      { "@type": "LocationFeatureSpecification", "name": "Kitchen", "value": true },
      { "@type": "LocationFeatureSpecification", "name": "BBQ area", "value": true }
    ]
  }
  @endverbatim
  </script>
</head>

<body>

<!-- =====================================================================
     SPRITE SVG — carved fretwork (ukiran kerawang) motif used throughout the page.
     Defined once, referenced repeatedly.
     ===================================================================== -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
  <defs>
    <!-- One repeating tile: fretwork curve + pierced motif + hanging valance.
         Two colour variants so the band can sit on two different backgrounds. -->
    <pattern id="ukiran-tile" width="64" height="46" patternUnits="userSpaceOnUse">
      <path fill="#F8F6F2" fill-rule="evenodd"
            d="M0 0 H64 V9 C55 9 51 14 49 21 C46 30 39 34 32 34 C25 34 18 30 15 21
               C13 14 9 9 0 9 Z
               M32 12 C36 12 38 15 38 18 C38 21 36 24 32 24 C28 24 26 21 26 18 C26 15 28 12 32 12 Z
               M32 34 L35 40 L32 46 L29 40 Z"/>
    </pattern>
    <pattern id="ukiran-tile-alt" width="64" height="46" patternUnits="userSpaceOnUse">
      <path fill="#F1ECE3" fill-rule="evenodd"
            d="M0 0 H64 V9 C55 9 51 14 49 21 C46 30 39 34 32 34 C25 34 18 30 15 21
               C13 14 9 9 0 9 Z
               M32 12 C36 12 38 15 38 18 C38 21 36 24 32 24 C28 24 26 21 26 18 C26 15 28 12 32 12 Z
               M32 34 L35 40 L32 46 L29 40 Z"/>
    </pattern>
  </defs>
</svg>

<!-- =====================================================================
     PRELOADER
     ===================================================================== -->
<div class="preloader" id="preloader" role="status" aria-live="polite" aria-label="Loading Teratak Moro Seneng">
  <div class="preloader__mark">
    <img src="{{ asset('images/logoMS.png') }}" alt="" width="120" height="85">
  </div>
  <p class="preloader__word">Teratak Moro Seneng</p>
</div>

<!-- Skip link for keyboard users -->
<a class="skip-link" href="#main">Skip to main content</a>

<!-- =====================================================================
     STICKY HEADER / NAVIGATION
     Menu is trimmed to five links only — Testimonials and Location
     remain reachable via the footer and by scrolling the page.
     ===================================================================== -->
<header class="nav" id="nav">
  <div class="nav__inner container">

    <a class="brand" href="#utama" aria-label="Teratak Moro Seneng, back to top">
      <span class="brand__mark" aria-hidden="true">
        <img src="{{ asset('images/logoMS.png') }}" alt="" width="68" height="48">
      </span>
      <span class="brand__text">
        <span class="brand__name">Teratak Moro Seneng</span>
        <span class="brand__sub">Sabak Bernam &middot; Selangor</span>
      </span>
    </a>

    <!-- Mobile menu button -->
    <button class="nav__toggle" id="navToggle" type="button"
            aria-expanded="false" aria-controls="navMenu" aria-label="Open menu">
      <span class="nav__bar"></span>
      <span class="nav__bar"></span>
      <span class="nav__bar"></span>
    </button>

    <nav class="nav__menu" id="navMenu" aria-label="Main menu">
      <ul class="nav__list">
        <li><a class="nav__link" href="#tentang">About</a></li>
        <li><a class="nav__link" href="#penginapan">Homestay</a></li>
        <li><a class="nav__link" href="#galeri">Gallery</a></li>
        <li><a class="nav__link" href="#majlis">Events</a></li>
        <li><a class="nav__link" href="#hubungi">Location</a></li>
      </ul>
      <button class="btn btn--gold btn--sm nav__cta" type="button" data-booking-open>Contact Us</button>
    </nav>
  </div>
</header>

<main id="main">

<!-- =====================================================================
     HERO
     ===================================================================== -->
<section class="hero" id="utama">

  <!-- Parallax image layer (driven by JS on scroll) -->
  <div class="hero__media" id="heroMedia">
    <!-- REPLACE: a wide shot of your house at dusk -->
    <img src="{{ asset('images/moroseneng.jpg') }}"
         alt="Traditional Malay house with a tall roof surrounded by coconut trees at dusk"
         fetchpriority="high" decoding="async" width="4096" height="3072">
  </div>
  <div class="hero__scrim" aria-hidden="true"></div>

  <!-- Falling leaves — generated by JS, disabled when motion is reduced -->
  <div class="leaves" id="leaves" aria-hidden="true"></div>

  <div class="hero__content container">
    <p class="eyebrow eyebrow--light hero__eyebrow">Batu 38 &middot; Sabak Bernam &middot; Selangor</p>

    <h1 class="hero__title">
      A Grand Traditional House, A Living Heritage<br>
      <em>For Your Stay and Your Celebration.</em>
    </h1>

    <p class="hero__lead">
      Set in Batu 38, Sabak Bernam, Teratak Moro Seneng is a traditional Malay wooden house where heritage, 
      hospitality and togetherness come together. Stay with family, gather with loved ones, 
      or celebrate life's special moments in a setting unlike any other.
    </p> 

    <div class="hero__actions">
      <div class="hero__picker" role="group" aria-label="Choose booking type">
        <span class="hero__picker-glide" aria-hidden="true"></span>
        <button class="hero__picker-opt" type="button" data-booking-open data-booking-type="Event Hall">
          <svg class="hero__picker-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="14" r="6"/><circle cx="15" cy="14" r="6"/></svg>
          Event Hall
        </button>
        <button class="hero__picker-opt" type="button" data-booking-open data-booking-type="Homestay">
          <svg class="hero__picker-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 11 12 4l8 7"/><path d="M6 10v10h12V10"/></svg>
          Homestay
        </button>
      </div>
      <!--<a class="btn btn--text-light" href="#galeri">
        <span class="btn__play" aria-hidden="true"></span> Browse Gallery
      </a>-->
    </div>

    <!-- The three things guests ask about most -->
    <ul class="hero__facts">
      <li><strong>6+</strong><span>Bedrooms</span></li>
      <li><strong>25+</strong><span>Overnight Guests</span></li>
      <li><strong>1 acre</strong><span>Open Grounds</span></li>
    </ul>
  </div>

  <a class="scroll-cue" href="#tentang" aria-label="Scroll to the About section">
    <span class="scroll-cue__line" aria-hidden="true"></span>
    <span class="scroll-cue__word">Come on in</span>
  </a>

  <!-- Carved fretwork silhouette closing the hero — the page's signature element -->
  <div class="ukiran-band ukiran-band--bottom" aria-hidden="true">
    <svg viewBox="0 0 1280 46" preserveAspectRatio="none"><rect width="1280" height="46" fill="url(#ukiran-tile)"/></svg>
  </div>
</section>

<!-- =====================================================================
     TENTANG
     ===================================================================== -->
<section class="section about" id="tentang">
  <div class="container about__grid">

    <div class="about__media" data-reveal>
      <figure class="about__photo about__photo--tall">
        <img src="{{ asset('images/moroseneng1.jpeg') }}"
             alt="Sunlight falling across the wooden floorboards of the main living room"
             loading="lazy" decoding="async" width="700" height="900">
      </figure>
    </div>

    <div class="about__body" data-reveal data-reveal-delay="1">
      <p class="eyebrow">Welcome Home</p>
      <h2 class="h2">One House,<br><em>A Thousand Stories.</em></h2>

      <p>Built in the 1960s and carried through generations, 
        Moro Seneng is more than a place to stay. Its timber structure, 
        traditional craftsmanship and distinctive Malay-Javanese character 
        tell the story of a family home built with care and meant to endure. 
        Today, its doors are open for families, gatherings and celebrations 
        to create stories of their own.</p>
      <ul class="ticks">
        <li>Traditional craftsmanship and architecture</li>
        <li>A Spacious setting for stays and gatherings</li>
        
      </ul>

      <a class="link-arrow" href="#penginapan">Explore More <span aria-hidden="true">&rarr;</span></a>
    </div>
  </div>
</section>

<!-- =====================================================================
     SERVICES — two ways to use this teratak
     ===================================================================== -->
<section class="section section--alt services">
  <div class="container">
    <header class="section__head" data-reveal>
      <p class="eyebrow">The Experience We Offer</p>
      <h2 class="h2">One Place, Many Ways to Gather</h2>
      <div class="rule" aria-hidden="true"><span></span><svg viewBox="0 0 48 24"><path d="M24 2c6 4 9 8 9 12 0 5-4 8-9 8s-9-3-9-8c0-4 3-8 9-12Zm0 6c-3 3-4.5 5.4-4.5 7.6 0 2.6 2 4.4 4.5 4.4s4.5-1.8 4.5-4.4C28.5 13.4 27 11 24 8Z"/><path d="M2 12h9M37 12h9"/></svg><span></span></div>
    </header>

    <div class="services__grid">

      <!-- Card 1 — Homestay -->
      <article class="scard" id="penginapan" data-reveal>
        <div class="scard__media">
          <img src="{{ asset('images/moroseneng5.jpeg') }}"
               alt="Exterior of the homestay with wooden steps and a shaded veranda"
               loading="lazy" decoding="async" width="1000" height="667">
          <span class="scard__tag">Whole house</span>
        </div>
        <div class="scard__body">
          <h3 class="scard__title"></span>Traditional Homestay</h3>
          <p>Enjoy the tranquility of a spacious, comfortable traditional wooden house.
            The whole house to yourselves, perfect for families and more meaningful getaways.</p>
          <ul class="feature-list">
            <li>Exclusive traditional wooden house</li>
            <li>6 comfortable bedrooms</li>
            <li>Full kitchen</li>
            <li>Ample parking</li>
          </ul>
          <button class="btn btn--gold btn--block" type="button" data-booking-open data-booking-type="Homestay">Book the Homestay</button>
        </div>
      </article>

      <!-- Card 2 — Event Hall -->
      <article class="scard" data-reveal data-reveal-delay="1">
        <div class="scard__media">
          <img src="{{ asset('images/moroseneng3.JPG') }}"
               alt="Outdoor event setup with draped fabric, flowers and rows of chairs"
               loading="lazy" decoding="async" width="1000" height="667">
          <span class="scard__tag">Up to 300 guests</span>
        </div>
        <div class="scard__body">
          <h3 class="scard__title">A Special Event </h3>
          <p>Celebrate your special day in a setting that's grand, nostalgic, and unmistakably kampung. Room enough for your event, your family, and your beloved guests.</p>
          <ul class="feature-list">
            <li>Engagement / Akad Nikah Ceremony</li>
            <li>Family Day</li>
            <li>Corporate Events</li>
            <li>Open House</li>
          </ul>
          <button class="btn btn--green btn--block" type="button" data-booking-open data-booking-type="Event Hall">Book the Event</button>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- =====================================================================
     WHY CHOOSE US
     ===================================================================== -->
<section class="section why">
  <div class="container">
    <header class="section__head" data-reveal>
      <p class="eyebrow">Our Uniqueness</p>
      <h2 class="h2">More Than a Homestay. A Living Heritage.</h2>
    </header>

    <ul class="why__grid">
      <li class="why__item" data-reveal>
        <span class="why__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24"><path d="M12 3 2 11h3v10h14V11h3L12 3Z"/></svg>
        </span>
        <h3>Grand, Antique Traditional Architecture House</h3>
        <p>a genuine taste of the past, with modern comfort.</p>
      </li>
      <li class="why__item" data-reveal data-reveal-delay="1">
        <span class="why__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24"><path d="M3 4h18v16H3z"/><path d="M3 10h18M9 20V10"/></svg>
        </span>
        <h3>6 Spacious & Comfortable Bedrooms</h3>
        <p>one of the largest traditional homestays around.</p>
      </li>
      <li class="why__item" data-reveal data-reveal-delay="2">
        <span class="why__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24"><path d="M4 20h16M6 20V9l6-5 6 5v11"/><path d="M10 20v-5h4v5"/></svg>
        </span>
        <h3>Spacious, Flexible Event Grounds</h3>
        <p>Specially designed with an under-house area and a spacious front yard for all events.</p>
      </li>
      <li class="why__item" data-reveal data-reveal-delay="3">
        <span class="why__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24"><path d="M12 21s-7-4.6-7-10a7 7 0 0 1 14 0c0 5.4-7 10-7 10Z"/><circle cx="12" cy="11" r="2.6"/></svg>
        </span>
        <h3>Surrounded by Natural Calm</h3>
        <p>fresh air, greenery, true village stillness.</p>
      </li>

    </ul>
  </div>
</section>

<!-- =====================================================================
     ACCOMMODATION FEATURES (dark wood band)
     ===================================================================== -->
<section class="section section--wood accommodation">
  <div class="container">
    <div class="acc__head" data-reveal>
      <div>
        <p class="eyebrow eyebrow--light">Homestay Moro Seneng</p>
        <h2 class="h2 h2--light">Everything is ready,<br>waiting for your arrival</h2>
      </div>
      <p class="acc__note">
        Enjoy a stay in a spacious, comfortable traditional wooden house surrounded by a peaceful natural setting.
        Perfect for families, weddings, engagements, reunions and all kinds of special occasions.
      </p>
    </div>

    <!-- Numbers count up once, only when they enter view -->
    <ul class="acc__stats" data-reveal>
      <li><strong data-count="6" data-suffix="+">0</strong><span>Bedrooms</span></li>
      <li><strong data-count="25" data-suffix="+">0</strong><span>Overnight Guests</span></li>
      <li><strong data-count="200" data-suffix="+">0</strong><span>Event Capacity</span></li>
      <li><strong data-count="30" data-suffix="+">0</strong><span>Parking Bays</span></li>
    </ul>
  </div>
</section>

<!-- =====================================================================
     GALLERY — masonry + filters + lightbox
     =====================================================================
<section class="section gallery" id="galeri">
  <div class="container">
    <header class="section__head" data-reveal>
      <p class="eyebrow">Gallery</p>
      <h2 class="h2">Take a look before you arrive</h2>
      <div class="rule" aria-hidden="true"><span></span><svg viewBox="0 0 48 24"><path d="M24 2c6 4 9 8 9 12 0 5-4 8-9 8s-9-3-9-8c0-4 3-8 9-12Zm0 6c-3 3-4.5 5.4-4.5 7.6 0 2.6 2 4.4 4.5 4.4s4.5-1.8 4.5-4.4C28.5 13.4 27 11 24 8Z"/><path d="M2 12h9M37 12h9"/></svg><span></span></div>
    </header>-->

    <!-- Category filters
    <div class="filters" role="group" aria-label="Filter gallery by category" data-reveal>
      <button class="filter is-active" type="button" data-filter="all" aria-pressed="true">All</button>
      <button class="filter" type="button" data-filter="exterior" aria-pressed="false">Exterior</button>
      <button class="filter" type="button" data-filter="hall" aria-pressed="false">Living Room</button>
      <button class="filter" type="button" data-filter="bedroom" aria-pressed="false">Bedroom</button>
      <button class="filter" type="button" data-filter="kitchen" aria-pressed="false">Kitchen</button>
      <button class="filter" type="button" data-filter="event" aria-pressed="false">Event Decor</button>
      <button class="filter" type="button" data-filter="garden" aria-pressed="false">Garden</button>
      <button class="filter" type="button" data-filter="compound" aria-pressed="false">Grounds</button>
      <button class="filter" type="button" data-filter="night" aria-pressed="false">Night View</button>
    </div>-->

    <!-- Masonry layout using CSS columns. Each button opens the lightbox.
    <div class="masonry" id="masonry">

      <button class="gitem" data-reveal type="button" data-cat="exterior" data-caption="The house viewed from the gate">
        <img src="https://images.unsplash.com/photo-1533105079780-92b9be482077?auto=format&fit=crop&w=800&q=70"
             alt="Exterior of a traditional Malay house with a steep roof and wooden plank walls" loading="lazy" decoding="async" width="800" height="1067">
        <span class="gitem__cap">Exterior</span>
      </button>

      <button class="gitem" data-reveal type="button" data-cat="hall" data-caption="Morning light in the main living room">
        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=70"
             alt="Spacious living room with wooden flooring and low seating" loading="lazy" decoding="async" width="800" height="533">
        <span class="gitem__cap">Living Room</span>
      </button>

      <button class="gitem" data-reveal type="button" data-cat="bedroom" data-caption="One of the five bedrooms">
        <img src="https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=800&q=70"
             alt="Simple bedroom with a wooden bed and white linens" loading="lazy" decoding="async" width="800" height="1000">
        <span class="gitem__cap">Bedroom</span>
      </button>

      <button class="gitem" data-reveal type="button" data-cat="event" data-caption="Akad nikah setup on the veranda">
        <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=800&q=70"
             alt="Event decor with flowers and draped fabric" loading="lazy" decoding="async" width="800" height="533">
        <span class="gitem__cap">Event Decor</span>
      </button>

      <button class="gitem" data-reveal type="button" data-cat="kitchen" data-caption="A full kitchen — cook just like at home">
        <img src="https://images.unsplash.com/photo-1556909212-d5b604d0c90d?auto=format&fit=crop&w=800&q=70"
             alt="Kitchen with cooking area, gas stove and cabinets" loading="lazy" decoding="async" width="800" height="1000">
        <span class="gitem__cap">Kitchen</span>
      </button>

      <button class="gitem" data-reveal type="button" data-cat="garden" data-caption="A garden path beside the house">
        <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=800&q=70"
             alt="Lush green garden with tropical plants" loading="lazy" decoding="async" width="800" height="533">
        <span class="gitem__cap">Garden</span>
      </button>

      <button class="gitem" data-reveal type="button" data-cat="compound" data-caption="Open grounds, ready for a tent to be set up">
        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=800&q=70"
             alt="Wide grassy grounds lined with trees" loading="lazy" decoding="async" width="800" height="533">
        <span class="gitem__cap">Open Grounds</span>
      </button>

      <button class="gitem" data-reveal type="button" data-cat="night" data-caption="Lights on after dusk">
        <img src="https://images.unsplash.com/photo-1470252649378-9c29740c9fa8?auto=format&fit=crop&w=800&q=70"
             alt="Warm lamplight illuminating the grounds at dusk" loading="lazy" decoding="async" width="800" height="1000">
        <span class="gitem__cap">Night View</span>
      </button>

      <button class="gitem" data-reveal type="button" data-cat="exterior" data-caption="Wooden steps leading up to the veranda">
        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=800&q=70"
             alt="Wooden steps leading to a shaded veranda" loading="lazy" decoding="async" width="800" height="533">
        <span class="gitem__cap">Veranda &amp; Steps</span>
      </button>

      <button class="gitem" data-reveal type="button" data-cat="event" data-caption="Guest seating beneath the shade of a tree">
        <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=800&q=70"
             alt="Event table decorated with flowers under a tree" loading="lazy" decoding="async" width="800" height="1200">
        <span class="gitem__cap">Event Setup</span>
      </button>

      <button class="gitem" data-reveal type="button" data-cat="hall" data-caption="Everyone fits in one space">
        <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=800&q=70"
             alt="Bright, open room inside the house with natural light" loading="lazy" decoding="async" width="800" height="533">
        <span class="gitem__cap">Family Room</span>
      </button>

      <button class="gitem" data-reveal type="button" data-cat="garden" data-caption="Coconut trees lining the boundary">
        <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=800&q=70"
             alt="Tall trees and greenery surrounding the house grounds" loading="lazy" decoding="async" width="800" height="1200">
        <span class="gitem__cap">Kampung Greenery</span>
      </button>

    </div>

    <p class="gallery__empty" id="galleryEmpty" hidden>No images in this category right now — try another category.</p>
  </div>
</section> -->

<!-- =====================================================================
     MOVING CAROUSEL — "A Glimpse"
     A strip of images drifting slowly and continuously from left to right.
     Pauses on mouse hover or when focused via keyboard.
     Click any image to open the lightbox.
     ===================================================================== -->
<section class="marquee-sec" aria-labelledby="marqueeHead" id="galeri">
  <div class="container marquee-head" data-reveal>
    <p class="eyebrow">Guest Gallery</p>
    <h2 class="h2 marquee-title" id="marqueeHead">A Day at the Teratak</h2>
  </div>

  <div class="marquee" id="marquee">
    <div class="marquee__track" id="marqueeTrack">

      <button class="cslide" type="button" data-caption="The house at dusk">
        <img src="{{ asset('images/moroseneng11.jpg') }}"
             alt="Traditional house at dusk" loading="lazy" decoding="async" width="600" height="800">
        <span class="cslide__cap">BBQ Time</span>
      </button>

      <button class="cslide" type="button" data-caption="The veranda, a spot for evening chats">
        <img src="{{ asset('images/moroseneng7.jpg') }}"
             alt="Shaded wooden veranda" loading="lazy" decoding="async" width="600" height="800">
        <span class="cslide__cap">The traditional charm of the living room</span>
      </button>

      <button class="cslide" type="button" data-caption="The living room in the morning">
        <img src="{{ asset('images/moroseneng9.jpg') }}"
             alt="Living room with wooden flooring" loading="lazy" decoding="async" width="600" height="800">
        <span class="cslide__cap">The staircase, a favourite photo spot</span>
      </button>

      <button class="cslide" type="button" data-caption="Open grounds waiting for a tent">
        <img src="{{ asset('images/moroseneng6.jpg') }}"
             alt="Wide open grassy grounds" loading="lazy" decoding="async" width="600" height="800">
        <span class="cslide__cap">Open grounds for gathering and events</span>
      </button>

      <button class="cslide" type="button" data-caption="Event decor beneath the shade of a tree">
        <img src="{{ asset('images/moroseneng17.jpg') }}"
             alt="Event decor with flowers" loading="lazy" decoding="async" width="600" height="800">
        <span class="cslide__cap">A cozy corner for conversations</span>
      </button>

      <button class="cslide" type="button" data-caption="Greenery bordering the grounds">
        <img src="{{ asset('images/moroseneng14.jpg') }}"
             alt="Tall trees surrounding the house grounds" loading="lazy" decoding="async" width="600" height="800">
        <span class="cslide__cap">Engagement Ceremony</span>
      </button>

      <button class="cslide" type="button" data-caption="A peaceful bedroom">
        <img src="{{ asset('images/moroseneng19.jpg') }}"
             alt="Bedroom with a wooden bed" loading="lazy" decoding="async" width="600" height="800">
        <span class="cslide__cap">Family Activity Area</span>
      </button>

      <button class="cslide" type="button" data-caption="Lights on after dusk">
        <img src="{{ asset('images/moroseneng12.jpg') }}"
             alt="Warm lamplight at night" loading="lazy" decoding="async" width="600" height="800">
        <span class="cslide__cap">Night View</span>
      </button>

    </div>
  </div>
</section>

<!-- =====================================================================
     EVENT HALL — large banner
     ===================================================================== -->
<section class="event" id="majlis">
  <div class="event__media" aria-hidden="true">
    <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?auto=format&fit=crop&w=1800&q=70"
         alt="" loading="lazy" decoding="async" width="1800" height="1200">
  </div>
  <div class="event__scrim" aria-hidden="true"></div>

  <div class="container event__content" data-reveal>
    <p class="eyebrow eyebrow--light">Events &amp; Programmes</p>
    <h2 class="h2 h2--light">Your special day,<br><em>set against this teratak</em></h2>
    <p class="event__lead">
      With open grounds directly in front of the house, 
      Moro Seneng offers a flexible setting for ceremonies, gatherings and celebrations. 
      From a simple family occasion to a larger event, the space can be arranged to suit your needs.
    </p>

    <ul class="pills">
      <li>Akad Nikah · Persanding · Engagement</li>
      <li>Hari Raya Open House</li>
      <li>Family Day · Corporate · Seminar</li>
    </ul>

    <div class="event__actions">
      <button class="btn btn--gold" type="button" data-booking-open data-booking-type="Event Hall">Book event dates</button>
    </div>
  </div>
</section>

<!-- =====================================================================
     TESTIMONIALS
     ===================================================================== -->
<section class="section section--alt testimonials" id="testimoni">
  <div class="container">
    <header class="section__head" data-reveal>
      <p class="eyebrow">What Guests Say</p>
      <h2 class="h2">Stories From Those Who've Stayed.</h2>
    </header>

    <div class="tgrid">
      <figure class="tcard" data-reveal>
        <div class="tcard__stars" role="img" aria-label="Rating 5 out of 5">★★★★★</div>
        <blockquote><p>A beautiful traditional house. Our whole family loved staying
          here — the kids played outside all weekend, and not one of them
          touched their phone.</p></blockquote>
        <figcaption>
          <span class="tcard__avatar" aria-hidden="true">NH</span>
          <span><strong>Puan Nurhaliza Abdullah</strong><small>Family stay &middot; Shah Alam</small></span>
        </figcaption>
      </figure>

      <figure class="tcard" data-reveal data-reveal-delay="1">
        <div class="tcard__stars" role="img" aria-label="Rating 5 out of 5">★★★★★</div>
        <blockquote><p>The perfect place for our engagement ceremony. The grounds easily
          fit all our guests, and the photos in front of the house turned out beautifully.</p></blockquote>
        <figcaption>
          <span class="tcard__avatar" aria-hidden="true">AF</span>
          <span><strong>Encik Ahmad Faizal</strong><small>Engagement Ceremony &middot; Klang</small></span>
        </figcaption>
      </figure>

      <figure class="tcard" data-reveal data-reveal-delay="2">
        <div class="tcard__stars" role="img" aria-label="Rating 5 out of 5">★★★★★</div>
        <blockquote><p>Peaceful, spacious and full of memories. We brought thirty people
          for a family day, and the host helped take care of everything — right down to
          the parking arrangements.</p></blockquote>
        <figcaption>
          <span class="tcard__avatar" aria-hidden="true">SR</span>
          <span><strong>Cik Siti Rohani</strong><small>Family gathering &middot; Sungai Besar</small></span>
        </figcaption>
      </figure>
    </div>
  </div>
</section>

<!-- =====================================================================
     LOCATION
     ===================================================================== -->
<section class="section location" id="lokasi">
  <div class="container">
    <header class="section__head" data-reveal>
      <p class="eyebrow">Our Location</p>
      <h2 class="h2">From the Teratak, Explore the Area</h2>
    </header>

    <div class="location__grid">
      <div class="location__map" data-reveal>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.268353868002!2d100.9482346756757!3d3.7516374491522644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb5f002a7ae805%3A0x4025ed63b77f5f66!2sTeratak%20Moro%20Seneng!5e0!3m2!1sen!2smy!4v1785944602305!5m2!1sen!2smy"
          title="Map showing the location of Teratak Moro Seneng in Sabak Bernam, Selangor"
          loading="lazy" referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen></iframe>

        <div class="location__map-photo" aria-hidden="true">
          <img src="{{ asset('images/moroseneng1.jpeg') }}" alt="" loading="lazy" decoding="async" width="200" height="200">
        </div>

        <div class="location__map-pin" aria-hidden="true">
          <svg viewBox="0 0 24 24"><path d="M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7Z"/><circle cx="12" cy="9" r="2.4"/></svg>
        </div>
      </div>

      <div class="location__nearby">
        <p class="location__nearby-label" data-reveal>Nearby Attractions</p>

        <div class="nearby__grid">
          <div class="nearby__card nearby__card--beach" data-reveal>
            <span class="nearby__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M2 17c2 0 2-2 4-2s2 2 4 2 2-2 4-2 2 2 4 2 2-2 4-2"/><path d="M2 12c2 0 2-2 4-2s2 2 4 2 2-2 4-2 2 2 4 2 2-2 4-2"/></svg>
            </span>
            <h4>Pantai Bagan Nakhoda Omar</h4>
            <p>Known as the "Bearded Tree Beach" — striking, unique mangrove roots lining the shoreline.</p>
          </div>

          <div class="nearby__card nearby__card--museum" data-reveal data-reveal-delay="1">
            <span class="nearby__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M3 10h18M4 10v10M8 10v10M12 10v10M16 10v10M20 10v10M2 21h20M3 10l9-6 9 6"/></svg>
            </span>
            <h4>Muzium Sabak Bernam</h4>
            <p>The local community's farming and fishing history, located on Jalan Pasar.</p>
          </div>

          <div class="nearby__card nearby__card--waterfront" data-reveal data-reveal-delay="2">
            <span class="nearby__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><circle cx="12" cy="9" r="5"/><path d="M12 14v7"/></svg>
            </span>
            <h4>Waterfront Sabak Bernam</h4>
            <p>A riverside recreational park with a children's playground — perfect for families.</p>
          </div>

          <div class="nearby__card nearby__card--fireflies" data-reveal data-reveal-delay="3">
            <span class="nearby__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M12 3v4M12 17v4M3 12h4M17 12h4M6 6l2.5 2.5M15.5 15.5 18 18M18 6l-2.5 2.5M8.5 15.5 6 18"/></svg>
            </span>
            <h4>Kuala Selangor Fireflies</h4>
            <p>A night-time boat tour to see thousands of fireflies along the Selangor River.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =====================================================================
     FAQ — accordion
     =====================================================================
<section class="section section--alt faq">
  <div class="container container--narrow">
    <header class="section__head" data-reveal>
      <p class="eyebrow">Before You Book</p>
      <h2 class="h2">Frequently Asked Questions</h2>
    </header>

    <div class="acc" id="faq" data-reveal>

      <div class="acc__item">
        <h3>
          <button class="acc__btn" type="button" aria-expanded="false" aria-controls="faq1" id="faq1-btn">
            <span>How many guests can stay overnight?</span>
            <span class="acc__sign" aria-hidden="true"></span>
          </button>
        </h3>
        <div class="acc__panel" id="faq1" role="region" aria-labelledby="faq1-btn">
          <p>The house comfortably accommodates 20 or more people across five or more
             bedrooms, with extra mattresses available in the living room. Let us know your
             guest count via message and we'll confirm the arrangement.</p>
        </div>
      </div>

      <div class="acc__item">
        <h3>
          <button class="acc__btn" type="button" aria-expanded="false" aria-controls="faq2" id="faq2-btn">
            <span>Can we hold a wedding or akad nikah here?</span>
            <span class="acc__sign" aria-hidden="true"></span>
          </button>
        </h3>
        <div class="acc__panel" id="faq2" role="region" aria-labelledby="faq2-btn">
          <p>Yes. These grounds regularly host akad nikah ceremonies, engagements, persanding
             ceremonies and open houses for around 300 guests. Booking the event hall together
             with an overnight stay makes the morning of the event much easier for the family.</p>
        </div>
      </div>

      <div class="acc__item">
        <h3>
          <button class="acc__btn" type="button" aria-expanded="false" aria-controls="faq3" id="faq3-btn">
            <span>Is there enough parking?</span>
            <span class="acc__sign" aria-hidden="true"></span>
          </button>
        </h3>
        <div class="acc__panel" id="faq3" role="region" aria-labelledby="faq3-btn">
          <p>There is parking for around 40 cars on-site, plus extra space in the grounds
             for larger events. No one needs to park along the main road.</p>
        </div>
      </div>

      <div class="acc__item">
        <h3>
          <button class="acc__btn" type="button" aria-expanded="false" aria-controls="faq4" id="faq4-btn">
            <span>Can we cook in the kitchen?</span>
            <span class="acc__sign" aria-hidden="true"></span>
          </button>
        </h3>
        <div class="acc__panel" id="faq4" role="region" aria-labelledby="faq4-btn">
          <p>Of course. The kitchen is equipped for family cooking and there's a BBQ area
             outside. For events, caterers are welcome to bring their own equipment.</p>
        </div>
      </div>

      <div class="acc__item">
        <h3>
          <button class="acc__btn" type="button" aria-expanded="false" aria-controls="faq5" id="faq5-btn">
            <span>Can we decorate the event hall ourselves?</span>
            <span class="acc__sign" aria-hidden="true"></span>
          </button>
        </h3>
        <div class="acc__panel" id="faq5" role="region" aria-labelledby="faq5-btn">
          <p>Yes — bring your own decorator, or use ours. Access for setup usually begins
             the evening before the event. We only ask that no nails be driven into the
             house's original woodwork.</p>
        </div>
      </div>

      <div class="acc__item">
        <h3>
          <button class="acc__btn" type="button" aria-expanded="false" aria-controls="faq6" id="faq6-btn">
            <span>How do we confirm a booking?</span>
            <span class="acc__sign" aria-hidden="true"></span>
          </button>
        </h3>
        <div class="acc__panel" id="faq6" role="region" aria-labelledby="faq6-btn">
          <p>Send us a message with your date and guest count. We'll check the calendar,
             send you the rate, and hold the date as soon as the deposit is received.</p>
        </div>
      </div>

    </div>
  </div>
</section>-->

<!-- =====================================================================
     CALL TO ACTION / CONTACT
     ===================================================================== -->
<section class="cta" id="hubungi">
  <div class="ukiran-band ukiran-band--top" aria-hidden="true">
    <svg viewBox="0 0 1280 46" preserveAspectRatio="none"><rect width="1280" height="46" fill="url(#ukiran-tile-alt)"/></svg>
  </div>

  <div class="container cta__inner" data-reveal>
    <p class="eyebrow eyebrow--light">Come Visit</p>
    <h2 class="cta__title">Ready to Experience<br>Traditional Malay Hospitality?</h2>

    <!-- Invitation pantun — a traditional touch closing the page -->
    <p class="pantun">
      Don't wait for your next celebration to experience it. 
      A grand space, real heritage, and a warmth you won't find anywhere else 
      — only at the Teratak.
    </p>  


    <div class="cta__actions">
      <button class="btn btn--gold btn--lg" type="button" data-booking-open>Book Now</button>
      <!-- REPLACE: your real phone number -->
      <!-- <a class="btn btn--outline-light btn--lg" href="tel:+60123456789">Contact Us Now</a> -->
    </div>
  </div>
</section>

</main>

<!-- =====================================================================
     FOOTER
     ===================================================================== -->
<footer class="footer">
  <div class="container footer__grid">

    <div class="footer__brand">
      <a class="brand brand--footer" href="#utama">
        <span class="brand__mark" aria-hidden="true">
          <img src="{{ asset('images/logoMS.png') }}" alt="" width="68" height="48">
        </span>
        <span class="brand__text">
          <span class="brand__name">Teratak Moro Seneng</span>
          <span class="brand__sub">Homestay &amp; Event Hall</span>
        </span>
      </a>
      <p class="footer__blurb">
        A traditional Malay house in Batu 38, Sabak Bernam — open to families,
        couples getting married and companies looking for a calmer setting.
      </p>
    </div>

    <div class="footer__col">
      <h2 class="footer__head">Contact</h2>
      <ul>
        <li><a href="https://wa.me/60123456789" target="_blank" rel="noopener">Contact &middot; +60 12-345 6789</a></li>
        <li><a href="mailto:salam@teratakmoroseneng.com">salam@teratakmoroseneng.com</a></li>
      </ul>
    </div>
  </div>

  <div class="container footer__bar">
    <p>&copy; <span id="year">2026</span> Teratak Moro Seneng. All rights reserved.</p>
    <p>Batu 38, Sabak Bernam, Selangor, Malaysia</p>
  </div>
</footer>

<!-- =====================================================================
     FLOATING ACTION BUTTONS
     ===================================================================== -->
<a class="fab fab--wa" id="fabWa"
   href="https://wa.me/60123456789?text=Assalamualaikum%20Teratak%20Moro%20Seneng%2C%20I%20would%20like%20to%20ask%20about%20booking."
   target="_blank" rel="noopener" aria-label="Chat with us">
  <svg viewBox="0 0 24 24" aria-hidden="true">
    <path d="M12.04 2C6.6 2 2.2 6.4 2.2 11.84c0 1.94.5 3.75 1.4 5.32L2 22l4.98-1.55a9.9 9.9 0 0 0 5.06 1.38h.01c5.43 0 9.84-4.4 9.84-9.84C21.89 6.4 17.48 2 12.04 2Zm5.75 13.9c-.24.68-1.4 1.3-1.94 1.34-.5.05-1.13.07-1.82-.11-.42-.11-.96-.29-1.66-.59-2.92-1.26-4.82-4.2-4.97-4.4-.14-.19-1.18-1.57-1.18-3s.75-2.13 1.02-2.42c.26-.29.58-.36.77-.36l.55.01c.18 0 .42-.07.65.5.24.58.82 2.01.9 2.16.07.14.12.31.02.5-.1.19-.14.31-.29.48-.14.17-.3.38-.43.5-.14.15-.29.31-.13.6.17.29.74 1.22 1.59 1.98 1.09.97 2.01 1.27 2.3 1.41.29.15.46.12.63-.07.17-.19.72-.84.91-1.13.19-.29.38-.24.65-.14.26.09 1.69.79 1.98.94.29.14.48.22.55.34.07.12.07.69-.17 1.36Z"/>
  </svg>
  <span class="fab__label">Contact us</span>
</a>

<button class="fab fab--top" id="backToTop" type="button" aria-label="Back to top">
  <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
</button>

<!-- =====================================================================
     BOOKING MODAL
     ===================================================================== -->
<div class="booking-modal" id="bookingModal" role="dialog" aria-modal="true" aria-labelledby="bookingTitle" hidden>
  <div class="booking-modal__panel">
    <button class="booking-modal__close" id="bookingClose" type="button" aria-label="Close booking form">&times;</button>

    <h3 class="booking-modal__title" id="bookingTitle">Booking Form</h3>
    <p class="booking-modal__note">Fill in the details below — we'll contact you to confirm your booking.</p>

    <form id="bookingForm" class="booking-form">
      <div class="booking-form__field">
        <label for="bkName">Name</label>
        <input type="text" id="bkName" name="name" required placeholder="Your full name">
      </div>

      <div class="booking-form__field">
        <span class="booking-form__label">Booking type</span>
        <div class="booking-form__radios">
          <label class="booking-radio">
            <input type="radio" name="type" value="Event Hall" checked>
            <span>Event Hall</span>
          </label>
          <label class="booking-radio">
            <input type="radio" name="type" value="Homestay">
            <span>Homestay</span>
          </label>
        </div>
      </div>

      <div class="booking-form__row">
        <div class="booking-form__field">
          <label for="bkFrom">From date</label>
          <input type="date" id="bkFrom" name="from" required>
        </div>
        <div class="booking-form__field">
          <label for="bkTo">To date</label>
          <input type="date" id="bkTo" name="to" required>
        </div>
      </div>

      <button class="btn btn--gold btn--block" type="submit">Submit Booking</button>
    </form>
  </div>
</div>

<!-- =====================================================================
     LIGHTBOX
     ===================================================================== -->
<div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-label="Image viewer" hidden>
  <button class="lightbox__close" id="lbClose" type="button" aria-label="Close image viewer">&times;</button>
  <button class="lightbox__nav lightbox__nav--prev" id="lbPrev" type="button" aria-label="Previous image">&#8249;</button>
  <button class="lightbox__nav lightbox__nav--next" id="lbNext" type="button" aria-label="Next image">&#8250;</button>
  <figure class="lightbox__figure">
    <img id="lbImage" src="" alt="">
    <figcaption id="lbCaption"></figcaption>
  </figure>
</div>

<!-- ===== All scripts are inlined here (originally js/script.js) ===== -->
<script>
/* =====================================================================
   TERATAK MORO SENENG — script.js
   ---------------------------------------------------------------------
   Vanilla JavaScript only. No dependencies, no build step.
   Every block is self-contained and guards against missing elements,
   so removing a section from the HTML will never break the rest.

   CONTENTS
   00. Config & helpers
   01. Preloader
   02. Navigation (sticky, drawer, scrollspy)
   03. Reveal on scroll (IntersectionObserver)
   04. Number counters
   05. Hero parallax
   06. Floating leaves
   07. Gallery filter
   08. Lightbox
   09. FAQ accordion
   10. Back to top
   11. Button ripple
   12. Broken-image fallback
   13. Footer year
   ===================================================================== */

(function () {
  'use strict';

  /* ===================================================================
     00. CONFIG & HELPERS
     =================================================================== */

  /* REPLACE: the only place the contact number needs changing.
     Format: country code + number, digits only. */
  var WA_NUMBER  = '60123456789';
  var TEL_NUMBER = '+60123456789';

  /* REPLACE: your Google Apps Script "Web App" URL (ending in /exec).
     See the setup instructions provided separately. Leave blank to disable. */
  var SHEET_WEBAPP_URL = 'https://script.google.com/macros/s/AKfycby4G-qgGvBGwIYnQK-rMZ6ozgWmcCGuujkExsEnDNA-3aBK8dCmCgMsr4FtJ_xnuhP50w/exec';

  /* The placeholder values currently written into index.html */
  var WA_PLACEHOLDER  = '60123456789';
  var TEL_PLACEHOLDER = '+60123456789';

  var $  = function (sel, ctx) { return (ctx || document).querySelector(sel); };
  var $$ = function (sel, ctx) {
    return Array.prototype.slice.call((ctx || document).querySelectorAll(sel));
  };

  var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* Sync every contact / phone link with the constants above. */
  (function syncContactLinks() {
    if (WA_NUMBER !== WA_PLACEHOLDER) {
      $$('a[href*="wa.me/' + WA_PLACEHOLDER + '"]').forEach(function (a) {
        a.href = a.href.replace(WA_PLACEHOLDER, WA_NUMBER);
      });
    }
    if (TEL_NUMBER !== TEL_PLACEHOLDER) {
      $$('a[href^="tel:"]').forEach(function (a) { a.href = 'tel:' + TEL_NUMBER; });
    }
  })();


  /* ===================================================================
     01. PRELOADER
     Fades out once everything is painted; a timeout guarantees the page
     is never held hostage by one slow image.
     =================================================================== */
  (function preloader() {
    var el = $('#preloader');
    if (!el) return;

    var dismiss = function () {
      el.classList.add('is-done');
      window.setTimeout(function () { el.remove(); }, 700);
    };

    window.addEventListener('load', function () {
      window.setTimeout(dismiss, prefersReducedMotion ? 0 : 500);
    });
    window.setTimeout(dismiss, 3500); // safety net
  })();


  /* ===================================================================
     02. NAVIGATION
     =================================================================== */
  (function navigation() {
    var nav    = $('#nav');
    var toggle = $('#navToggle');
    var menu   = $('#navMenu');
    var links  = $$('.nav__link');
    if (!nav) return;

    /* --- Sticky glass state --- */
    var onScroll = function () {
      nav.classList.toggle('is-stuck', window.scrollY > 40);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    /* --- Mobile drawer --- */
    var closeMenu = function () {
      if (!menu || !toggle) return;
      menu.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
      toggle.setAttribute('aria-label', 'Open menu');
      document.body.classList.remove('is-locked');
    };

    if (toggle && menu) {
      toggle.addEventListener('click', function () {
        var open = menu.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
        document.body.classList.toggle('is-locked', open);
      });

      /* Close after choosing a destination */
      menu.addEventListener('click', function (e) {
        if (e.target.closest('a')) closeMenu();
      });

      /* Escape closes, and focus returns to the toggle */
      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && menu.classList.contains('is-open')) {
          closeMenu();
          toggle.focus();
        }
      });

      /* Clicking the page behind the drawer closes it */
      document.addEventListener('click', function (e) {
        if (!menu.classList.contains('is-open')) return;
        if (menu.contains(e.target) || toggle.contains(e.target)) return;
        closeMenu();
      });

      /* Reset state if the viewport grows past the drawer breakpoint */
      window.matchMedia('(min-width: 960px)').addEventListener('change', closeMenu);
    }

    /* --- Scrollspy: highlight the section currently in view --- */
    var sections = links
      .map(function (l) { return document.querySelector(l.getAttribute('href')); })
      .filter(Boolean);

    if ('IntersectionObserver' in window && sections.length) {
      var spy = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          links.forEach(function (l) {
            l.classList.toggle('is-active', l.getAttribute('href') === '#' + entry.target.id);
          });
        });
      }, { rootMargin: '-45% 0px -50% 0px', threshold: 0 });

      sections.forEach(function (s) { spy.observe(s); });
    }
  })();


  /* ===================================================================
     03. REVEAL ON SCROLL
     Elements marked data-reveal fade up once. data-reveal-delay="n"
     staggers them by n × 110ms.
     =================================================================== */
  (function revealOnScroll() {
    var items = $$('[data-reveal]');
    if (!items.length) return;

    /* No observer support, or motion turned down: show everything now. */
    if (!('IntersectionObserver' in window) || prefersReducedMotion) {
      items.forEach(function (el) { el.classList.add('is-in'); });
      return;
    }

    items.forEach(function (el) {
      var d = el.getAttribute('data-reveal-delay');
      if (d) el.style.setProperty('--reveal-delay', d);
    });

    var observer = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-in');
        obs.unobserve(entry.target);        // reveal once, then stop watching
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });

    items.forEach(function (el) { observer.observe(el); });
  })();


  /* ===================================================================
     04. NUMBER COUNTERS
     =================================================================== */
  (function counters() {
    var nums = $$('[data-count]');
    if (!nums.length) return;

    var render = function (el, value) {
      el.textContent = value + (el.getAttribute('data-suffix') || '');
    };

    if (!('IntersectionObserver' in window) || prefersReducedMotion) {
      nums.forEach(function (el) { render(el, el.getAttribute('data-count')); });
      return;
    }

    var run = function (el) {
      var target   = parseInt(el.getAttribute('data-count'), 10) || 0;
      var duration = 1400;
      var start    = null;

      var step = function (now) {
        if (start === null) start = now;
        var p = Math.min((now - start) / duration, 1);
        var eased = 1 - Math.pow(1 - p, 3);          // easeOutCubic
        render(el, Math.round(target * eased));
        if (p < 1) requestAnimationFrame(step);
      };
      requestAnimationFrame(step);
    };

    var obs = new IntersectionObserver(function (entries, o) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        run(entry.target);
        o.unobserve(entry.target);
      });
    }, { threshold: 0.5 });

    nums.forEach(function (el) { obs.observe(el); });
  })();


  /* ===================================================================
     05. HERO PARALLAX
     Transform-only, batched into requestAnimationFrame. Skipped on
     phones (where it costs more than it gives) and on reduced motion.
     =================================================================== */
  (function parallax() {
    var media = $('#heroMedia');
    if (!media || prefersReducedMotion) return;
    if (window.matchMedia('(max-width: 767px)').matches) return;

    var ticking = false;

    var update = function () {
      var y = window.scrollY;
      if (y < window.innerHeight * 1.2) {
        media.style.transform = 'translate3d(0,' + (y * 0.3) + 'px,0)';
      }
      ticking = false;
    };

    window.addEventListener('scroll', function () {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(update);
    }, { passive: true });
  })();


  /* ===================================================================
     06. FLOATING LEAVES
     Purely decorative ambience in the hero.
     =================================================================== */
  (function leaves() {
    var host = $('#leaves');
    if (!host || prefersReducedMotion) return;

    var count = window.innerWidth < 768 ? 7 : 14;
    var frag  = document.createDocumentFragment();
    var tints = ['#D8C3A5', '#B8893C', '#2F6B3B'];

    for (var i = 0; i < count; i++) {
      var leaf = document.createElement('span');
      var size = 8 + Math.random() * 14;

      leaf.className = 'leaf';
      leaf.style.left            = (Math.random() * 100) + '%';
      leaf.style.width           = size + 'px';
      leaf.style.height          = size + 'px';
      leaf.style.background      = tints[i % tints.length];
      leaf.style.opacity         = String(0.18 + Math.random() * 0.3);
      leaf.style.animationDuration = (13 + Math.random() * 14) + 's';
      leaf.style.animationDelay    = (-Math.random() * 20) + 's';
      frag.appendChild(leaf);
    }
    host.appendChild(frag);
  })();


  /* ===================================================================
     07. GALLERY FILTER
     =================================================================== */
  (function galleryFilter() {
    var buttons = $$('.filter');
    var items   = $$('.gitem');
    var empty   = $('#galleryEmpty');
    if (!buttons.length || !items.length) return;

    buttons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var cat = btn.getAttribute('data-filter');

        buttons.forEach(function (b) {
          var on = b === btn;
          b.classList.toggle('is-active', on);
          b.setAttribute('aria-pressed', String(on));
        });

        var shown = 0;
        items.forEach(function (item) {
          var match = cat === 'all' || item.getAttribute('data-cat') === cat;
          item.classList.toggle('is-hidden', !match);
          if (match) shown++;
        });

        if (empty) empty.hidden = shown > 0;
      });
    });
  })();


  /* ===================================================================
     08. LIGHTBOX
     Generic: any element with an <img> and a data-caption can open it.
     Both the masonry grid and the moving carousel feed into it.
     Keyboard: Escape closes, arrow keys change the image.
     =================================================================== */
  var Lightbox = (function () {
    var box     = $('#lightbox');
    var img     = $('#lbImage');
    var caption = $('#lbCaption');
    var btnPrev = $('#lbPrev');
    var btnNext = $('#lbNext');
    var btnX    = $('#lbClose');
    if (!box || !img) return { attach: function () {} };

    var list   = [];   // the elements currently being cycled through
    var index  = 0;
    var opener = null;

    var show = function (i) {
      var item = list[i];
      if (!item) return;
      var thumb = item.querySelector('img');
      index = i;
      img.src = thumb.src;
      img.alt = thumb.alt;
      caption.textContent = item.getAttribute('data-caption') || thumb.alt;
    };

    var open = function (items, item) {
      var i = items.indexOf(item);
      if (i < 0) return;
      list   = items;
      opener = item;
      box.hidden = false;
      document.body.classList.add('is-locked');
      requestAnimationFrame(function () { box.classList.add('is-open'); });
      show(i);
      btnX.focus();
    };

    var close = function () {
      box.classList.remove('is-open');
      document.body.classList.remove('is-locked');
      window.setTimeout(function () { box.hidden = true; img.src = ''; }, 300);
      if (opener) { opener.focus(); opener = null; }
    };

    var move = function (step) {
      if (!list.length) return;
      show((index + step + list.length) % list.length);
    };

    btnX.addEventListener('click', close);
    btnPrev.addEventListener('click', function () { move(-1); });
    btnNext.addEventListener('click', function () { move(1); });

    /* Click the background (not the image or a button) to close */
    box.addEventListener('click', function (e) {
      if (e.target === box || e.target.classList.contains('lightbox__figure')) close();
    });

    document.addEventListener('keydown', function (e) {
      if (box.hidden) return;
      if (e.key === 'Escape')     { close(); }
      if (e.key === 'ArrowLeft')  { move(-1); }
      if (e.key === 'ArrowRight') { move(1); }
    });

    /* Swipe support on touch devices */
    var startX = null;
    box.addEventListener('touchstart', function (e) { startX = e.touches[0].clientX; }, { passive: true });
    box.addEventListener('touchend', function (e) {
      if (startX === null) return;
      var dx = e.changedTouches[0].clientX - startX;
      if (Math.abs(dx) > 55) move(dx < 0 ? 1 : -1);
      startX = null;
    });

    return {
      /* getList() is called at click time, so filtering stays accurate */
      attach: function (trigger, getList) {
        trigger.addEventListener('click', function () {
          open(getList(), trigger);
        });
      }
    };
  })();

  /* --- Wire the masonry grid into the lightbox --- */
  (function galleryLightbox() {
    var items = $$('.gitem');
    if (!items.length) return;

    /* Only cycle through what the current filter is showing */
    var visible = function () {
      return items.filter(function (i) { return !i.classList.contains('is-hidden'); });
    };

    items.forEach(function (item) { Lightbox.attach(item, visible); });
  })();


  /* ===================================================================
     08a. BOOKING MODAL
     Collects name, booking type (Event Hall / Homestay) and dates,
     then sends it straight out as a pre-filled message.
     =================================================================== */
  (function bookingModal() {
    var modal    = $('#bookingModal');
    var form     = $('#bookingForm');
    var btnOpen  = $$('[data-booking-open]');
    var btnClose = $('#bookingClose');
    var fromIn   = $('#bkFrom');
    var toIn     = $('#bkTo');
    if (!modal || !form || !btnOpen.length) return;

    var opener = null;

    /* If this button was pressed from inside the mobile menu drawer, close the
       drawer first so it doesn't stay open behind the modal. */
    var closeMobileDrawer = function () {
      var navMenu   = $('#navMenu');
      var navToggle = $('#navToggle');
      if (!navMenu || !navMenu.classList.contains('is-open')) return;
      navMenu.classList.remove('is-open');
      if (navToggle) {
        navToggle.setAttribute('aria-expanded', 'false');
        navToggle.setAttribute('aria-label', 'Open menu');
      }
    };

    var open = function (trigger) {
      opener = trigger;
      closeMobileDrawer();

      /* If the trigger button has a data-booking-type, pre-select that booking type */
      var presetType = trigger && trigger.dataset ? trigger.dataset.bookingType : null;
      if (presetType) {
        var radio = form.querySelector('input[name="type"][value="' + presetType + '"]');
        if (radio) radio.checked = true;
      }

      modal.hidden = false;
      document.body.classList.add('is-locked');
      requestAnimationFrame(function () { modal.classList.add('is-open'); });
      $('#bkName').focus();
    };

    var close = function () {
      modal.classList.remove('is-open');
      document.body.classList.remove('is-locked');
      window.setTimeout(function () { modal.hidden = true; }, 300);
      if (opener) { opener.focus(); opener = null; }
    };

    btnOpen.forEach(function (btn) {
      btn.addEventListener('click', function () { open(btn); });
    });
    btnClose.addEventListener('click', close);

    modal.addEventListener('click', function (e) { if (e.target === modal) close(); });

    document.addEventListener('keydown', function (e) {
      if (modal.hidden) return;
      if (e.key === 'Escape') close();
    });

    /* The "to" date cannot be before the "from" date */
    fromIn.addEventListener('change', function () {
      toIn.min = fromIn.value;
      if (toIn.value && toIn.value < fromIn.value) toIn.value = fromIn.value;
    });

    var formatTarikh = function (iso) {
      if (!iso) return '';
      var d = new Date(iso + 'T00:00:00');
      return d.toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' });
    };

    /* Send the booking row to Google Sheets via the Apps Script Web App.
       mode: 'no-cors' means the response can't be read — this is "send only",
       which is enough because we just need Apps Script to receive and save the data. */
    var saveToSheet = function (data) {
      if (!SHEET_WEBAPP_URL) return;
      var params = new URLSearchParams();
      Object.keys(data).forEach(function (key) { params.append(key, data[key]); });
      fetch(SHEET_WEBAPP_URL, { method: 'POST', mode: 'no-cors', body: params })
        .catch(function () { /* no connection — the booking still proceeds */ });
    };

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var name = form.name.value.trim();
      var type = form.type.value;
      var from = form.from.value;
      var to   = form.to.value;

      saveToSheet({ name: name, type: type, from: from, to: to });

      var message =
        'Assalamualaikum Teratak Moro Seneng, I would like to make a booking.\n' +
        'Name: ' + name + '\n' +
        'Type: ' + type + '\n' +
        'Date: ' + formatTarikh(from) + ' - ' + formatTarikh(to);

      window.open('https://wa.me/' + WA_NUMBER + '?text=' + encodeURIComponent(message), '_blank', 'noopener');
      close();
      form.reset();
    });
  })();


  /* ===================================================================
     08b. MOVING CAROUSEL — "A Glimpse"
     The track is duplicated so the -50% -> 0 animation loops without a gap.
     Clones are marked data-clone and hidden from screen readers and from
     the tab order, so they are never announced twice.
     =================================================================== */
  (function marquee() {
    var track = $('#marqueeTrack');
    if (!track) return;

    var originals = $$('.cslide', track);
    if (!originals.length) return;

    /* Copy one full set to the end of the track */
    var frag = document.createDocumentFragment();
    originals.forEach(function (slide) {
      var clone = slide.cloneNode(true);
      clone.setAttribute('data-clone', 'true');
      clone.setAttribute('aria-hidden', 'true');
      clone.setAttribute('tabindex', '-1');
      frag.appendChild(clone);
    });
    track.appendChild(frag);

    /* Speed scales with width: more slides, longer duration */
    var seconds = Math.max(30, originals.length * 7);
    track.style.animationDuration = seconds + 's';

    /* Original slides open the lightbox; their cycle list is the originals */
    var listOf = function () { return originals; };
    originals.forEach(function (slide) { Lightbox.attach(slide, listOf); });

    /* Clones forward their click to the matching original slide */
    $$('.cslide[data-clone]', track).forEach(function (clone, i) {
      clone.addEventListener('click', function () {
        if (originals[i]) originals[i].click();
      });
    });
  })();


  /* ===================================================================
     09. FAQ ACCORDION
     One panel open at a time. Height is animated from the measured
     content, so nothing is hard-coded in CSS.
     =================================================================== */
  (function accordion() {
    var root = $('#faq');
    if (!root) return;

    var buttons = $$('.acc__btn', root);

    var panelOf = function (btn) {
      return document.getElementById(btn.getAttribute('aria-controls'));
    };

    var collapse = function (btn) {
      var panel = panelOf(btn);
      if (!panel) return;
      btn.setAttribute('aria-expanded', 'false');
      panel.classList.remove('is-open');
      panel.style.maxHeight = '0px';
    };

    var expand = function (btn) {
      var panel = panelOf(btn);
      if (!panel) return;
      btn.setAttribute('aria-expanded', 'true');
      panel.classList.add('is-open');
      panel.style.maxHeight = panel.scrollHeight + 'px';
    };

    buttons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var isOpen = btn.getAttribute('aria-expanded') === 'true';
        buttons.forEach(collapse);
        if (!isOpen) expand(btn);
      });
    });

    /* Keep an open panel the right height if the text rewraps */
    window.addEventListener('resize', function () {
      buttons.forEach(function (btn) {
        if (btn.getAttribute('aria-expanded') !== 'true') return;
        var panel = panelOf(btn);
        if (panel) panel.style.maxHeight = panel.scrollHeight + 'px';
      });
    });
  })();


  /* ===================================================================
     10. BACK TO TOP
     =================================================================== */
  (function backToTop() {
    var btn = $('#backToTop');
    if (!btn) return;

    var onScroll = function () {
      btn.classList.toggle('is-visible', window.scrollY > window.innerHeight * 0.8);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    btn.addEventListener('click', function () {
      window.scrollTo({
        top: 0,
        behavior: prefersReducedMotion ? 'auto' : 'smooth'
      });
    });
  })();


  /* ===================================================================
     11. BUTTON RIPPLE
     =================================================================== */
  (function ripple() {
    if (prefersReducedMotion) return;

    document.addEventListener('click', function (e) {
      var btn = e.target.closest('.btn');
      if (!btn) return;

      var rect = btn.getBoundingClientRect();
      var size = Math.max(rect.width, rect.height);
      var span = document.createElement('span');

      span.className = 'ripple';
      span.style.width  = span.style.height = size + 'px';
      span.style.left   = (e.clientX - rect.left - size / 2) + 'px';
      span.style.top    = (e.clientY - rect.top  - size / 2) + 'px';

      btn.appendChild(span);
      window.setTimeout(function () { span.remove(); }, 650);
    });
  })();


  /* ===================================================================
     12. BROKEN-IMAGE FALLBACK
     Placeholder photos are hot-linked while real ones are being shot.
     If any fail to load, swap in an on-brand pattern instead of the
     browser's broken-image icon.
     =================================================================== */
  (function imageFallback() {
    var svg =
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300">' +
        '<defs>' +
          '<linearGradient id="g" x1="0" y1="0" x2="1" y2="1">' +
            '<stop offset="0" stop-color="#D8C3A5"/><stop offset="1" stop-color="#6B4F2A"/>' +
          '</linearGradient>' +
        '</defs>' +
        '<rect width="400" height="300" fill="url(#g)"/>' +
        '<path d="M200 108 132 164h16v54h104v-54h16L200 108Zm0 28 38 32v40h-22v-30h-32v30h-22v-40l38-32Z" ' +
              'fill="#F8F6F2" opacity=".72"/>' +
      '</svg>';

    var dataUri = 'data:image/svg+xml;charset=utf-8,' + encodeURIComponent(svg);

    document.addEventListener('error', function (e) {
      var el = e.target;
      if (el.tagName !== 'IMG' || el.dataset.fallbackApplied) return;
      el.dataset.fallbackApplied = 'true';
      el.src = dataUri;
      el.style.objectFit = 'cover';
    }, true); // capture phase — error events don't bubble
  })();


  /* ===================================================================
     13. FOOTER YEAR
     =================================================================== */
  (function year() {
    var el = $('#year');
    if (el) el.textContent = String(new Date().getFullYear());
  })();

})();

</script>
</body>
</html>