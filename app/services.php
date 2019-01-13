<?php
declare(strict_types=1);

$container['config'] = include "config/config.php";
$container['database::connection'] = function ($container): \Doctrine\DBAL\Connection {
    \Doctrine\DBAL\DriverManager::getConnection(
        $container['config']['database'],
        new \Doctrine\DBAL\Configuration()
    );
};

$container['router'] = include "routes.php";

$container['template::engine'] = function ($container) {
    return new \League\Plates\Engine(
        $container['config']['templates']['dir'].'/'.$container['config']['templates']['theme']
    );
};