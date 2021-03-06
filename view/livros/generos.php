<?php require __DIR__.'/../inicioHTML.php'; ?>

<div class="container mb-2">
    <a href="novo-livro" class="btn btn-outline-primary ">Novo Livro</a>
    <a href="listar-livros" type="button" class="btn btn-outline-danger ">Voltar</a>
</div>

<?php foreach ($livros as $livro) :
extract($livro);
?>
      <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card" style="width:18rem;">
              <img src="<?= "arquivos/capa/". $capa; ?>"  class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?= $titulo; ?></h5>
                  <p class="card-text">
                    <p class="card-text  text-truncate"><?= $descricao; ?></p>
                  </p>
                    <p class="card-text">
                    <p class="card-text">Gênero: <?php echo ucfirst($genero); ?></p>
                    </p>
                     <sapan>
                      <a href="/alterar-livro?id=<?= $id;  ?>" class="btn btn-outline-info">Alterar</a>
                      <a href="/excluir-livro?id=<?= $id;  ?>" class="btn btn-outline-danger"> Excluir </a>
                     </sapan>
              </div>
          </div>
      </div>


  <?php endforeach; ?>

<?php require __DIR__.'/../fimHTML.php';?>
