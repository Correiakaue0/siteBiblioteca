<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Livros;
use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\helper\flashMessageTrait;
use Alura\Cursos\helper\TraitHTML;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Edicao implements RequestHandlerInterface
{
    use TraitHTML,flashMessageTrait;

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
    public function handle(ServerRequestInterface $request):ResponseInterface
    {
        $conn = $this->entityManager->getConnection();
        $conn->createQueryBuilder();

        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $sql = "SELECT * FROM livro l INNER JOIN capas c ON l.id = c.livro_id WHERE id = '$id'";
        $result = $conn->executeQuery($sql);
        $livros = $result->fetchAll();



        $resposta = new Response(302, ['Location' => '/listar-livros']);

        if ( is_null($id) || $id === false){
            $this->defineMensagem('danger', 'ID do livro inválido');
            return $resposta;
        }


        $html =  $this->renderizaHtml('livros/altera-livro.php',[
         'livros' => $livros,
         'Titulo' => strtoupper('Alterar Livro ')
        ]);
        return new Response(200, [], $html);


    }
}