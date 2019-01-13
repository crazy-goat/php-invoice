<?php
declare(strict_types=1);

return
    new \CrazyGoat\Tiny\Router(
        CrazyGoat\Router\cachedDispatcher(
        function (CrazyGoat\Router\RouteCollector $r) {
            $r->addRoute(['GET', 'POST'], '/login', 'controller::login');
            $r->addGroup(
                '/',
                function (CrazyGoat\Router\RouteCollector $r) {
                    $r->addRoute('GET', '', 'controller::main');
                    $r->addRoute('GET', 'user/{id:[0-9]+}', 'handler1');
                    $r->addRoute('GET', 'user/{name}', 'handler2');
                },
                ['middleware::login-require']
            );
            $r->addGroup(
                '/',
                function (CrazyGoat\Router\RouteCollector $r) {

                },
                ['middleware::api-login-require']
            );
        },
        [
            'cacheFile' => $container['config']['router']['cacheFile'],
            'cacheDisabled' => $container['config']['router']['cacheDisabled'],
        ]
    )
);