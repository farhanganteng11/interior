<?php

// Pastikan folder cache otomatis terbuat di folder /tmp Vercel
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Pindahkan folder cache yang error karena read-only
$_ENV['APP_STORAGE'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

// Buat struktur folder secara otomatis jika belum ada di serverless
if (!is_dir('/tmp/storage/framework/views')) {
    mkdir('/tmp/storage/framework/views', 0755, true);
    mkdir('/tmp/storage/framework/sessions', 0755, true);
    mkdir('/tmp/storage/framework/caches', 0755, true);
    mkdir('/tmp/storage/bootstrap/cache', 0755, true);
}

// Set lingkungan ke bootstrap cache baru
$_ENV['BOOTSTRAP_CACHE_PATH'] = '/tmp/storage/bootstrap/cache/packages.php';
$_ENV['BOOTSTRAP_SERVICES_PATH'] = '/tmp/storage/bootstrap/cache/services.php';

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Paksa override path storage Laravel agar menunjuk ke /tmp
$app->useStoragePath('/tmp/storage');

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
