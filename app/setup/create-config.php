<?php
declare(strict_types=1);

$emptyConfigFile = '<?php
declare(strict_types=1);

$config = include "config.dist.php";

// your custom config here

return $config;
';

if (!file_exists(__DIR__ . '/../config/config.php')) {
    file_put_contents(__DIR__ . '/../config/config.php', $emptyConfigFile);
}