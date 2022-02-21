<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\helper\TraitHTML;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class formularioLogin implements RequestHandlerInterface
{ use TraitHTML;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
      $html =  $this->renderizaHtml('login/login.php',[
            'titulo' => 'Login'

        ]);
      return new Response(200, [], $html);

    }
}