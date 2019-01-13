<?php
declare(strict_types=1);
$container = new \Pimple\Container();

include "setup/setup.php";
include "services.php";
include "controllers.php";

$app = new CrazyGoat\PHPInvoice\App($container);

return $app;