<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Capas;
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

        $genero = filter_var(
            $request->getParsedBody()['genero'],
            FILTER_SANITIZE_STRING);

        $livro = new Livros();
        $livro->setDescricao($descricao);
        $livro->setTitulo($titulo);
        $livro->setAutor($autor);
        $livro->setGenero($genero);


        require_once 'validacaoArquivoCapa.php';
        $livro->setImagem($contra);
        require_once 'validacaoArquivoContraCapa.php';
        $capa = new Capas();
        $capa->setCapa($contra);
        $capa->setContraCapa($contraC);
        $id = filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT);


        $tipo = 'success';




        if (!is_null($id) && $id !== false) {
            $livro->setId($id);
            $capa->setIdCapa($id);
            $this->entityManager->merge($livro);// altera livro no banco de dados
            $this->entityManager->merge($capa);
            $this->defineMensagem($tipo, 'Livro atualizado com sucesso');
        } else {
            $this->entityManager->persist($livro);// insere o livro na banco de dados
            $this->entityManager->persist($capa);
            $this->defineMensagem($tipo, 'Livro inserido com sucesso');
        }

        //Usamos o flush para sincronizar esses dados com o banco de dados
        $this->entityManager->flush();


        return new Response(302, ['Location' => '/listar-livros']);

    }

}