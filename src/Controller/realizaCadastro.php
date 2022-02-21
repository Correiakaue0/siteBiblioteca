<?php

  namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\helper\flashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class realizaCadastro implements RequestHandlerInterface
{
    use flashMessageTrait;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var EntityManagerInterface
     */

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $nome = filter_var($request->getParsedBody()['nome'], FILTER_SANITIZE_STRING);
        $email = filter_var($request->getParsedBody()['email'], FILTER_VALIDATE_EMAIL);
        $senha = filter_var($request->getParsedBody()['senha'], FILTER_SANITIZE_STRING);

        $resposta = new Response(302, ['Location' => '/novo-login']);


        $usuario = new Usuario();

        if (!is_null($nome) || $nome !== false){
           $usuario->setNome($nome);

        }else{
           $this->defineMensagem('danger','precisa colocar o nome');
           return $resposta;
        }

      if (!is_null($email) || $email !== false) {
          $usuario->setEmail($email);
      }else{
          $this->defineMensagem('danger','Precisa inserir o email');
          return $resposta;
      }


      if (!is_null($senha) || $senha !== false) {
          $usuario->setSenha(password_hash($senha,PASSWORD_ARGON2I));
      }else{
          $this->defineMensagem('danger','insira um senha correta');
          return $resposta;
      }


          $this->entityManager->persist($usuario);
          $this->entityManager->flush();
          $this->defineMensagem('success','Usuario cadastrado com Sucesso!');






      return new Response(202,['Location' => '/login']);



        }
}