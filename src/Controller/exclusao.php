<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Arquivos;
use Alura\Cursos\Entity\Capas;
use Alura\Cursos\Entity\Livros;
use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\helper\flashMessageTrait;
use Alura\Cursos\helper\TraitHTML;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class exclusao implements RequestHandlerInterface
{
    use TraitHTML;

    use flashMessageTrait;
    /**
     * @var ObjectRepository
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

    }

    /**
     * @throws ORMException
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);

        $resposta = new Response(302,['Location' => '/listar-livros']);
        if (is_null($id) || $id === false){
            $this->defineMensagem('danger','Livro Inexistente !');
            return $resposta;
        }
        $livro = $this->entityManager->getReference(Livros::class,$id); //monta o livro
        $this->entityManager->remove($livro); // remove o livro
        $this->entityManager->flush(); // manda a informação pro banco
        $this->defineMensagem('success','Livro Excluido com sucesso!');
        return $resposta;



    }
}