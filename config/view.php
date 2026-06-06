<?php

return [
    'paths' => [
        resource_path('views'),
    ],

    'compiled' => is_dir('/tmp') ? '/tmp' : env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
