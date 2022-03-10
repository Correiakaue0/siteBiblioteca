<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Livros;
use Alura\Cursos\helper\TraitHTML;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class formularioGenero implements RequestHandlerInterface
{
    use TraitHTML;
    private $repositorioDeLivros;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeLivros = $entityManager->getRepository(Livros::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $genero = filter_var($request->getQueryParams()['genero'],FILTER_SANITIZE_STRING);


        $livros = $this->repositorioDeLivros->findBy(
            ['genero' => $genero ]
        );
        $html = $this->renderizaHtml('livros/generos.php',[
            'livros' => $livros,
            'titulo' =>  mb_strtoupper($genero),
            'genero' => $genero
        ]);
        return new Response(202,[], $html);
    }
}