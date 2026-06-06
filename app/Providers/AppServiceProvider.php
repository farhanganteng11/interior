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
        // Supaya Laravel tidak eror read-only saat berjalan di Vercel
        if (isset($_SERVER['VERCEL_BACKGROUND_WORKER'])) {
            app()->useStoragePath('/tmp/storage');
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
