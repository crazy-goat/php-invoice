<?php
declare(strict_types=1);

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

$container['middleware::login-require'] = function () {
    return new \CrazyGoat\PHPInvoice\Middleware\AuthenticatedUser();
};

$container['controller::login'] = function ($container) {
    return new \CrazyGoat\PHPInvoice\Controllers\Auth\Login(
        $container['template::engine']
    );
};

$container['controller::main'] = function (){
    return function (RequestInterface $request, ResponseInterface $response)
    {
        $response->getBody()->write('main');
        return $response;
    };
};