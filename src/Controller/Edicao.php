<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Livros;
use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\helper\flashMessageTrait;
use Alura\Cursos\helper\TraitHTML;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Edicao implements RequestHandlerInterface
{
    use TraitHTML,flashMessageTrait;
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $repositorioDeLivros;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeLivros = $entityManager->getRepository(Livros::class);
    }

    public function handle(ServerRequestInterface $request):ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );



        $resposta = new Response(302, ['Location' => '/listar-livros']);

        if ( is_null($id) || $id === false){
            $this->defineMensagem('danger', 'ID do livro inválido');
            return $resposta;
        }

        $livro = $this->repositorioDeLivros->find($id);

        $html =  $this->renderizaHtml('livros/novo-livro.php',[
        'livro' => $livro,
         'titulo' => 'Alterar Livro '
        ]);
        return new Response(200, [], $html);


    }
}