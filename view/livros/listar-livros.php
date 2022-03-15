
  <?php
  require __DIR__.'/../inicioHTML.php';
  ?>
  <?php foreach ($livros as $livro):
  extract($livro);
  ?>
    <div style="text-align: center;">
        <span>
        <div class="btn-group mb-2" role="group" aria-label="Basic example">
            <a href="/generos?genero=<?= isset($genero) ? $genero : ""; ?>" type="button" id="genero" class="btn btn-primary"><?= ucfirst($genero);?>
            </a>
         </div>
        </span>
    </div>
<?php endforeach;?>

  <div class="container">
      <a href="novo-livro" class="btn btn-outline-primary mb-2">Novo Livro</a>
  </div>


  <?php foreach ($livros as $livro):
      extract($livro);
      ?>

      <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card" style="width:18rem;">
              <img src="arquivos/capa/<?=$capa?>"  class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $titulo ;?></h5>
                  <p class="card-text">
                    <p class="card-text  text-truncate"><?php echo $descricao; ?></p>
                  </p>
                    <p class="card-text">
                    <p class="card-text">Genero: <?php echo ucfirst($genero); ?></p>
                    </p>
                     <sapan>
                      <a href="/alterar-livro?id=<?= $id;  ?>" class="btn btn-outline-info">Alterar</a>
                      <a href="/excluir-livro?id=<?= $id;  ?>" class="btn btn-outline-danger"> Excluir </a>
                         <a href="/detalhes?id=<?= $id;  ?>" class="btn btn-outline-warning"> Detalhes </a>
                     </sapan>
              </div>
          </div>
      </div>



  <?php endforeach;
  require __DIR__.'/../fimHTML.php';
  ?>


