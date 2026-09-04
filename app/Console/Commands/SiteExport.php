<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

/**
 * Renders the site to plain HTML for Cloudflare Pages, one file per language.
 *
 * Pages serves static files only — no PHP — so the live site is these exported
 * files, not the Blade view. Run this after ANY copy or markup change and
 * commit the result, otherwise the deploy ships the previous wording.
 */
class SiteExport extends Command
{
    protected $signature = 'site:export';

    protected $description = 'Render the site to static HTML in public/ for Cloudflare Pages';

    /**
     * Locale => path of the file written under public/.
     * Must match the $pages map in resources/views/index.blade.php and the
     * routes in routes/web.php.
     */
    private const PAGES = [
        'ms' => 'index.html',
        'en' => 'en/index.html',
    ];

    public function handle(): int
    {
        $originalLocale = App::getLocale();

        foreach (self::PAGES as $locale => $file) {
            App::setLocale($locale);

            $target = public_path($file);
            File::ensureDirectoryExists(dirname($target));
            File::put($target, View::make('index')->render());

            $this->line(sprintf('  <fg=green>✓</> public/%s  <fg=gray>(%s, %s KB)</>',
                str_replace('\\', '/', $file),
                $locale,
                number_format(File::size($target) / 1024)
            ));
        }

        App::setLocale($originalLocale);

        $this->newLine();
        $this->info('Static export written. Commit public/ so Cloudflare Pages picks it up.');

        return self::SUCCESS;
    }
}
