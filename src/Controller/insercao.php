<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Arquivos;
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
        $titulo = filter_var(
            $request->getParsedBody()['titulo'],
            FILTER_SANITIZE_STRING);

        $descricao = filter_var(
           $request->getParsedBody()['descricao']
            ,FILTER_SANITIZE_STRING);

        $autor = filter_var(
            $request->getParsedBody()['autor'],
            FILTER_SANITIZE_STRING);



        $livro = new Livros();
        $livro->setDescricao($descricao);
        $livro->setTitulo($titulo);
        $livro->setAutor($autor);
        require_once 'validacaoArquivo.php';
        $id = filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT);
        $arquivo = new Arquivos();
        $arquivo->setTituloLivro($titulo);
        $arquivo->setPath($colocar_banco);


        $tipo = 'success';




        if (!is_null($id) && $id !== false) {
            $livro->setId($id);
            $arquivo->setIdLivro($id);
            $this->entityManager->merge($livro);
            $this->entityManager->merge($arquivo);// altera livro no banco de dados
            $this->defineMensagem($tipo, 'Livro atualizado com sucesso');
        } else {
            $arquivo->setIdLivro($id);
            $this->entityManager->persist($arquivo);
            $this->entityManager->persist($livro);// insere o livro na banco de dados
            $this->defineMensagem($tipo, 'Livro inserido com sucesso');
        }

        //Usamos o flush para sincronizar esses dados com o banco de dados
        $this->entityManager->flush();


        return new Response(302, ['Location' => '/listar-livros']);

    }

}