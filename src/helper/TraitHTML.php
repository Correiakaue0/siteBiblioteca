<?php

namespace Alura\Cursos\helper;

trait TraitHTML
{
    public function renderizaHtml(string $caminhoTemplate, array $dados): string
    {
        extract($dados); //extract recebe um array associativo e extrai cada uma das chaves para uma variavel.
        ob_start(); //output buffer start - guarda o que esta sendo exibido
        require __DIR__ . '/../../view/' . $caminhoTemplate;
        $html = ob_get_clean(); // output buffer clean - retorna dados do buffer e limpa em seguida

        return $html;

    }
}