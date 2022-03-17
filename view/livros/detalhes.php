<?php include __DIR__.'/../inicioHTML.php';?>
<?php foreach ($livros as $livro) :
extract($livro);
?>
<body id="body">
<!-- hero area -->
<section class="section mb-2">
    <a href="listar-livros" type="button" class="btn btn-outline-danger mb-5">Voltar</a>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center mb-5 mb-md-0 row">
                <img src="arquivos/capa/<?= $capa ?>"  class="card-img-top " style="width: 50%; height: auto">
                <img src="arquivos/contraCapa/<?= $contraCapa ?>"  class="card-img-top " style="height: 50%; width: 50% ">

            </div>
            <div class="col-md-6 align-self-center text-center text-md-left">
                <div class="block">
                    <h1 class="font-weight-bold mb-4 font-size-60"><?= $titulo ?></h1>
                    <p class="mb-4"><?= $descricao ?></p>
                    <p class="mb-4"><?= $autor ?></p>
                    <p class="mb-4"><?= ucfirst($genero) ?></p>

                </div>
                <a href="/alterar-livro?id=<?= $id;  ?>" class="btn btn-outline-info">Alterar</a>
                <a href="/excluir-livro?id=<?= $id;  ?>" class="btn btn-outline-danger"> Excluir </a>
            </div>
        </div><!-- .row close -->
    </div><!-- .container close -->
</section><!-- header close -->


<?php
endforeach;
include __DIR__.'/../fimHTML.php';?>

