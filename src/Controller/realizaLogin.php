<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\helper\flashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class realizaLogin implements RequestHandlerInterface
{
    use flashMessageTrait;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorioDeUsuarios;

    public function __construct(EntityManagerInterface $entityManager)
    {
       $this->repositorioDeUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL);

        $redirecionamentoLogin = new Response(302, ['Location' => '/login']);


        if (is_null($email) || $email === false) {
            $this->defineMensagem('danger','O e-mail digitado não é um e-mail válido.');
            header('Location: /login');

            return $redirecionamentoLogin;
        }

        $senha = filter_input(
            INPUT_POST,
            'senha',
            FILTER_SANITIZE_STRING
        );


        $usuario = $this->repositorioDeUsuarios
            ->findOneBy(['email' => $email]); //findOneBy = "encontar um por"

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $this->defineMensagem('danger','E-mail ou senha inválidos');
            header('Location: /login');

            return $redirecionamentoLogin;
        }
        $_SESSION['logado'] = true;
        return new Response(302, ['Location' => '/listar-livros']);
        
    }

}