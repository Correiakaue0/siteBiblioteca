
  <?php
  require __DIR__.'/../inicioHTML.php';
  ?>
  <?php foreach ($livros as $livro):
  extract($livro);
  ?>
    <div style="text-align: center;">
        <div class="container">
            <a href="/generos?genero=<?= isset($genero) ? $genero : ""; ?>" type="button" id="genero" class="btn btn-primary mb-2"><?= ucfirst($genero);?>
            </a>
         </div>
    </div>
<?php endforeach;?>

  <div class="container">
      <a href="novo-livro" class="btn btn-outline-primary mb-2">Novo Livro</a>
  </div>


  <?php foreach ($livros as $livro):
      extract($livro);
      ?>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-2 con" >
          <div class="card" style="width:18rem;" id="card">
              <img src="arquivos/capa/<?=$capa?>"  class="card-img-top">
                <div class="card-body" id="livro">
                  <h5 class="card-title" id="titulo" ><?php echo $titulo ;?></h5>
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
      <script src="/buscar-livro.js"></script>





  <?php endforeach;
  require __DIR__.'/../fimHTML.php';
  ?>


