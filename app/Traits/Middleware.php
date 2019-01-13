<?php
declare(strict_types=1);

namespace CrazyGoat\PHPInvoice\Traits;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

trait Middleware
{
    /**
     * @var callable
     */
    protected $top;

    protected function addMiddleware(callable $callable)
    {
        if (is_null($this->top)) {
            $this->initStack();
        }
        $next = $this->top;
        $this->top = function (
            ServerRequestInterface $request,
            ResponseInterface $response
        ) use (
            $callable,
            $next
        ) {
            $result = call_user_func($callable, $request, $response, $next);
            if ($result instanceof ResponseInterface === false) {
                throw new \RuntimeException(
                    'Middleware must return instance of \Psr\Http\Message\ResponseInterface'
                );
            }

            return $result;
        };

        return $this;
    }

    protected function initStack(callable $kernel = null)
    {
        if (!is_null($this->top)) {
            throw new \RuntimeException('MiddlewareStack can only be seeded once.');
        }

        $this->top = $kernel ?? $this;
    }

    public function callMiddlewareStack(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        if (is_null($this->top)) {
            $this->initStack();
        }

        $start = $this->top;
        $response = $start($request, $response);
        return $response;
    }
}
