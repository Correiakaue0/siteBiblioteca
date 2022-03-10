<?php
if(isset($_FILES['Capa1'])){
    $arquivo1 = $_FILES['Capa1'];

    $pasta1 = __DIR__ . "/../../public/arquivos/capa/";
    $nomeDoArquivo1 = $arquivo1['name'];
    $novoNomeDoArquivo1 = uniqid();
    $extensao1 = strtolower(pathinfo($nomeDoArquivo1, PATHINFO_EXTENSION));

    if ($extensao1 != "jpg" && $extensao1 != "png")
        die('tipo de arquivo nao aceito');

    $deu_certo = move_uploaded_file($arquivo1['tmp_name'], $pasta1 . $novoNomeDoArquivo1 . "." . $extensao1);
    $contra = $novoNomeDoArquivo1 . "." . $extensao1;



}