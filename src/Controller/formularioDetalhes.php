<?php

namespace Alura\Cursos\Controller;

use Doctrine\DBAL;
use Alura\Cursos\Entity\Livros;
use Alura\Cursos\helper\TraitHTML;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class formularioDetalhes implements RequestHandlerInterface
{
    use TraitHTML;

    private $repositorioDeLivros;

    private $entityManager;

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
        $id = filter_var($request->getQueryParams()['id'],FILTER_VALIDATE_INT);
        $conn = $this->entityManager->getConnection();
        $conn->createQueryBuilder();


        $sql = "SELECT * FROM livro l INNER JOIN capas c ON l.id = c.livro_id where id = $id";
        $result = $conn->executeQuery($sql);
        $livros = $result->fetchAll();




        $html = $this->renderizaHtml('livros/detalhes.php',[
            'Titulo' =>  'detalhes',
            'livros' => $livros
        ]);
        return new Response(202,[], $html);
    }
}