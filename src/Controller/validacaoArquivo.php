<?php
if(isset($_FILES['uploadAvatar'])){
    $arquivo = $_FILES['uploadAvatar'];
    if ($arquivo['error'])
        echo 'falha ao enviar arquivo';

    $pasta = __DIR__."/../../arquivos/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png")
        die('tipo de arquivo nao aceito');

    $deu_certo = move_uploaded_file($arquivo['tmp_name'], $pasta . $novoNomeDoArquivo . "." . $extensao);
    $colocar_banco = '/../arquivos/'. $novoNomeDoArquivo . "." . $extensao;



}