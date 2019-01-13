<?php
declare(strict_types=1);

namespace CrazyGoat\PHPInvoice\Traits;

use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;

trait WithRenderer
{
    abstract protected function getRenderer(): Engine;

    public function WithRenderer(ResponseInterface $response, string $name, array $data): ResponseInterface
    {
        $response->getBody()->write(
            $this->getRenderer()->render(
                $name,
                $data
            )
        );
        $response->getBody()->rewind();
        return $response;
    }
}