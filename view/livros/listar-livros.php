
  <?php
  require __DIR__.'/../inicioHTML.php';
  ?>
  <?php foreach ($livros as $livro): ?>
    <center>
        <span>
        <div class="btn-group mb-2" role="group" aria-label="Basic example">
            <a href="/generos?genero=<?= isset($livro) ? $livro->getGenero() : ''; ?>" type="button" id="genero" class="btn btn-primary"><?=
                isset($livro) ? ucfirst($livro->getGenero()) : '' ;?>
            </a>
         </div>
        </span>
    </center>
  <?php endforeach;?>


  <div class="container">
      <a href="novo-livro" class="btn btn-outline-primary mb-2">Novo Livro</a>
  </div>



  <?php foreach ($livros as $livro): ?>
      <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card" style="width:18rem;">
              <img src="<?= "arquivos/capa/".$livro->getImagem(); ?>"  class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?= $livro->getTitulo(); ?></h5>
                  <p class="card-text">
                    <p class="card-text  text-truncate"><?= $livro->getDescricao(); ?></p>
                  </p>
                    <p class="card-text">
                    <p class="card-text">Genero: <?= ucfirst($livro->getGenero()); ?></p>
                    </p>
                     <sapan>
                      <a href="/alterar-livro?id=<?= $livro->getId();  ?>" class="btn btn-outline-info">Alterar</a>
                      <a href="/excluir-livro?id=<?= $livro->getId();  ?>" class="btn btn-outline-danger"> Excluir </a>
                         <a href="/detalhes?id=<?= $livro->getId();  ?>" class="btn btn-outline-warning"> Detalhes </a>
                     </sapan>
              </div>
          </div>
      </div>



  <?php endforeach;
  require __DIR__.'/../fimHTML.php';
  ?>


