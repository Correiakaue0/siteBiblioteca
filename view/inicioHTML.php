<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="imagem/png" href="https://cdn-icons-png.flaticon.com/512/225/225932.png" />
    <title>Biblioteca</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="/listar-livros">
                <img src="https://cdn-icons-png.flaticon.com/512/225/225932.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Biblioteca
            </a>
            <form class="d-flex" action="/logout">
                <button class="btn btn-outline-danger" type="submit">Sair</button>
            </form>
        </div>
    </nav>

<div class="container ">
    <div class="jumbotron">
        <h1><?= $titulo ?></h1>
    </div>
    <?php if (isset($_SESSION['mensagem'])) : ?>
        <div class="alert alert-<?= $_SESSION['tipoMensagem'];  ?>">
            <?= $_SESSION['mensagem']; ?>
        </div>
    <?php
    endif;
    unset($_SESSION['mensagem']);  //Unset = desarmar -- flash Messages = so aparece 1 vez
    unset($_SESSION['tipoMensagem']);
    ?>


