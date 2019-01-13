<?php
declare(strict_types=1);

$config = include "config.dist.php";

// your custom config here
$config['router']['cacheDisabled'] = true;

return $config;
