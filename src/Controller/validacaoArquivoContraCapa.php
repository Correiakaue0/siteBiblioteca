<?php
if(isset($_FILES['contra'])){
    $arquivo = $_FILES['contra'];


    $pasta = __DIR__ . "/../../public/arquivos/contraCapa/";
    $nomeDoArquivo = extract($arquivo);

    $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $novoNomeDoArquivo = uniqid();


    if ($extensao != "jpg" && $extensao != "png")
        die('tipo de arquivo nao aceito');

    $deu_certo = move_uploaded_file($arquivo['tmp_name'], $pasta . $novoNomeDoArquivo . "." . $extensao);
    $contraC = $novoNomeDoArquivo . "." . $extensao;



}