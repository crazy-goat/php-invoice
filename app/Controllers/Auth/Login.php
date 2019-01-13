<?php

namespace CrazyGoat\PHPInvoice\Controllers\Auth;

use CrazyGoat\Core\Interfaces\ControllerInterface;
use CrazyGoat\PHPInvoice\Traits\WithRenderer;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Login implements ControllerInterface
{
    use WithRenderer;
    /**
     * @var Engine
     */
    private $renderer;

    public function __construct(Engine $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->WithRenderer(
            $response,
            'login/login',
            []
        );
    }

    protected function getRenderer(): Engine
    {
        return $this->renderer;
    }
}