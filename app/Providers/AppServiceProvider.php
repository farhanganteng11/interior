<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 1. Paksa Laravel pindahin semua folder storage utama ke /tmp khusus Vercel
        app()->useStoragePath('/tmp/storage');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 2. Otomatis buat folder framework views di dalam /tmp jika belum ada
        $compiledViews = '/tmp/storage/framework/views';
        if (!is_dir($compiledViews)) {
            mkdir($compiledViews, 0755, true);
        }

        // 3. Kunci jalur kompilasi blade ke folder /tmp yang baru dibuat tadi
        config(['view.compiled' => $compiledViews]);
    }
}
