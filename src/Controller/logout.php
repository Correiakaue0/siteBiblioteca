<?php

namespace Alura\Cursos\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class logout implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface  $request): ResponseInterface
    {
        session_destroy();
        return new Response(202,['Location' => '/login'] );
    }
}