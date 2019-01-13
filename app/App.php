<?php
declare(strict_types=1);

namespace CrazyGoat\PHPInvoice;

use Pimple\Container;
use Psr\Container\ContainerInterface;

final class App extends \CrazyGoat\Tiny\App
{
    public function __construct(Container $container)
    {
        parent::__construct(new\Pimple\Psr11\Container($container));
    }
}