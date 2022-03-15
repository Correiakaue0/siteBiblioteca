<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Livros;
use Alura\Cursos\helper\TraitHTML;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class formularioGenero implements RequestHandlerInterface
{
    use TraitHTML;

    private $repositorioDeLivros;
    private  $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorioDeLivros = $entityManager->getRepository(Livros::class);
    }

    /**
     * @throws DBALException
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $genero = filter_var($request->getQueryParams()['genero'],FILTER_SANITIZE_STRING);
        $conn = $this->entityManager->getConnection();
        $conn->createQueryBuilder();
        $sql = "SELECT * FROM livro l INNER JOIN capas c ON l.id = c.livro_id Where genero = '$genero'";
        $result = $conn->executeQuery($sql);
        $livros = $result->fetchAll();


        $html = $this->renderizaHtml('livros/generos.php',[
            'livros' => $livros,
            'Titulo' =>  mb_strtoupper($genero),
            'genero' => $genero
        ]);
        return new Response(202,[], $html);
    }
}