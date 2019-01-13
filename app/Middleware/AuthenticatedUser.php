<?php

namespace CrazyGoat\PHPInvoice\Middleware;

use CrazyGoat\Core\Interfaces\MiddlewareInterface;
use Dflydev\FigCookies\Cookies;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AuthenticatedUser implements MiddlewareInterface
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ): ResponseInterface {
        $cookie = Cookies::fromRequest($request);
        if ($cookie->has('session')) {
            return $next($request, $response);
        }

        return $response->withHeader('Location', '/login');
    }
}