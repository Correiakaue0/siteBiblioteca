<?php

namespace Alura\Cursos\Controller;



use Alura\Cursos\Entity\Livros;
use Alura\Cursos\helper\TraitHTML;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class listarLivros implements RequestHandlerInterface
{ use TraitHTML;
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
        $conn = $this->entityManager->getConnection();
        $conn->createQueryBuilder();

        $sql = "SELECT id,titulo, descricao, genero, capa  FROM livro l INNER JOIN capas c ON l.id = c.livro_id ";
        $result = $conn->executeQuery($sql);
        $livros = $result->fetchAll();


        //findAll === retorna dados do banco.
        //$livros = $this->repositorioDeLivros->findAll(); // buscar algo no banco de dados

        $html =  $this->renderizaHtml('livros/listar-livros.php' , [
            'livros' => $livros ,
            'Titulo' => strtoupper('Lista de Livros')
            ]);

        return new Response(200, [], $html);


    }

}