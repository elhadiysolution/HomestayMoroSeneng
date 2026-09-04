<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
 * One route per language, because the live site is a static export on
 * Cloudflare Pages: "/" is Malay, "/en/" is English, and each is rendered to
 * its own HTML file by `php artisan site:export`. A cookie or session would
 * have nothing to run on there, so the URL is the only source of truth.
 *
 * Keep these paths in step with SiteExport::PAGES.
 */
foreach (['ms' => '/', 'en' => '/en'] as $locale => $uri) {
    Route::get($uri, function () use ($locale) {
        App::setLocale($locale);

        return view('index');
    })->name("home.{$locale}");
}
