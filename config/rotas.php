<?php

use Alura\Cursos\Controller\{Edicao,
    exclusao,
    formularioDetalhes,
    formularioGenero,
    formularioInsercao,
    formularioLogin,
    formularioNovoLogin,
    insercao,
    listarLivros,
    logout,
    realizaCadastro,
    realizaLogin};

$rotas = [
    '/listar-livros' => listarLivros::class,
    '/novo-livro' => formularioInsercao::class,
    '/salvar-livro' => insercao::class,
    '/excluir-livro' => exclusao::class,
    '/alterar-livro' => Edicao::class,
    '/login' => formularioLogin::class,
    '/realiza-login' => realizaLogin::class,
    '/logout' => logout::class,
    '/novo-login' => formularioNovoLogin::class,
    '/novo-login2' => realizaCadastro::class,
    '/generos' => formularioGenero::class,
    '/detalhes' => formularioDetalhes::class
];

return $rotas;