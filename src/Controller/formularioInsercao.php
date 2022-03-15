<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\helper\TraitHTML;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class formularioInsercao implements RequestHandlerInterface
{
    use TraitHTML;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('livros/novo-livro.php',[
            'Titulo' => strtoupper('Novo Livro')
        ]);
        return new Response(202,[], $html);

    }
}