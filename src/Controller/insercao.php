<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Livros;
use Alura\Cursos\helper\flashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class insercao implements RequestHandlerInterface
{
    use flashMessageTrait;
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $descricao = filter_var(
           $request->getParsedBody()['descricao']
            ,FILTER_SANITIZE_STRING);


        $livro = new Livros();
        $livro->setDescricao($descricao);

        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );
        $tipo = 'success';

        if (!is_null($id) && $id !== false) {
            $livro->setId($id);
            $this->entityManager->merge($livro); // altera livro no banco de dados
            $this->defineMensagem($tipo, 'Livro atualizado com sucesso');
        } else {
            $this->entityManager->persist($livro); // insere o livro na banco de dados
            $this->defineMensagem($tipo, 'Livro inserido com sucesso');
        }

        //Usamos o flush para sincronizar esses dados com o banco de dados
        $this->entityManager->flush();

        return new Response(302, ['Location' => '/listar-livros']);

    }

}