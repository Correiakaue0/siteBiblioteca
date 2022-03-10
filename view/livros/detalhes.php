<?php include __DIR__.'/../inicioHTML.php';?>
<?php foreach ($livros as $livro):?>

<?php
    extract($livro);
    echo "$id $Titulo $genero $contraCapa $capa \n";
?>
    <div class="container mb-2">
        <a href="listar-livros" type="button" class="btn btn-outline-danger ">Voltar</a>
    </div>
<span class="row">
     <h1>Titulo: <?= $Titulo ?></h1><br>
     <h1>Genero: <?=$genero ?></h1>
    <img src="<?="arquivos/capa/".$capa; ?>" class="img-fluid animated" width="30%" alt="">
    <img src="<?="arquivos/contraCapa/".$contraCapa; ?>" class="img-fluid animated" width="30%" alt="">
</span>
<br>
</br>




<?php endforeach;?>
<?php  include __DIR__.'/../fimHTML.php';?>
