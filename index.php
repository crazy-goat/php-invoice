<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', "on");

include "vendor/autoload.php";

/** @var \CrazyGoat\PHPInvoice\App $app */
$app = include "app/boostrap.php";

$app->run();