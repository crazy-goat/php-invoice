<?php
declare(strict_types=1);

return [
    'database' => [
        'url' => 'sqlite:///data/phpfaktury.sqlite'
    ],
    'router' => [
        'cacheDisabled' => false,
        'cacheFile' => __DIR__.'/../../cache/router.cache.php'
    ],
    'templates' => [
        'dir' => __DIR__.'/../templates',
        'theme' => 'default'
    ]
];