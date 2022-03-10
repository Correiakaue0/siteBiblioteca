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

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeLivros = $entityManager->getRepository(Livros::class);
    }


    /**
     * @throws DBALException
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var($request->getQueryParams()['id'],FILTER_VALIDATE_INT);

        $conn = DriverManager::getConnection([
                'dbname' => 'biblioteca',
                'user' => 'root',
                'password'=>'',
                'host' => 'localhost',
                'driver' => 'pdo_mysql']
        );

        $sql = "SELECT id, Titulo,genero,contraCapa, capa FROM Livro INNER JOIN capas ON capas.id_capa = livro.id where id = $id";
        $result = $conn->executeQuery($sql);
        $livro = $result->fetchAll();




        $html = $this->renderizaHtml('livros/detalhes.php',[
            'titulo' =>  '',
            'livros' => $livro
        ]);
        return new Response(202,[], $html);
    }
}