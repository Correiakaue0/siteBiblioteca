<?php

namespace Alura\Cursos\helper;

trait flashMessageTrait
{
    public function defineMensagem(string $tipo , $mensagem): void{
        $_SESSION['tipoMensagem'] = $tipo ;
        $_SESSION['mensagem'] = $mensagem ;
    }
}