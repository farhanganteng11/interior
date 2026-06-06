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

            // Paksa bikin folder views biar gak eror ->resolve('view')
            if (!is_dir('/tmp/storage/framework/views')) {
                mkdir('/tmp/storage/framework/views', 0755, true);
            }
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
