<?php

// 1. Mindahin folder compile views ke /tmp khusus buat Vercel biar gak Error 500
$compiledViews = '/tmp/storage/framework/views';
if (!is_dir($compiledViews)) {
    mkdir($compiledViews, 0755, true);
}
putenv("VIEW_COMPILED_PATH={$compiledViews}");

// 2. Eksekusi Laravel index yang asli
require __DIR__ . '/../public/index.php';
