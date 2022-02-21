<?php

namespace Alura\Cursos\Controller;



use Alura\Cursos\Entity\Livros;
use Alura\Cursos\helper\TraitHTML;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class listarLivros implements RequestHandlerInterface
{ use TraitHTML;
    private $repositorioDeLivros;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeLivros = $entityManager->getRepository(Livros::class);
    }
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        //findAll === retorna dados do banco.
        $livros = $this->repositorioDeLivros->findAll(); // buscar algo no banco de dados
        $html =  $this->renderizaHtml('livros/listar-livros.php' , [
            'livros' => $livros ,
            'titulo' => 'Lista de Livros'
            ]);

        return new Response(200, [], $html);


    }

}