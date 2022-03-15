<?php include __DIR__.'/../inicioHTML.php';?>
<?php foreach ($livros as $livro): ?>
    <?php
    extract($livro);
    ?>

    <form action="/salvar-livro<?= isset($id) ? '?id='.$id : '' ?>" method="post"
          class="container" enctype="multipart/form-data">
        <center>
            <div class="">
                <span>

                    <label for="contraCapa" >
                    <p style="display:block" class="btn"><img src="/arquivos/capa.png" width="20%" alt="Selecione uma imagem" id="Capa"></p>
                    <input type="file" id="Capa1" name="Capa1" style="display:;" value="">
                </label>
                    <label for="uploadAvatar" >
                    <p style="display:block" class="btn"><img src="/arquivos/contraCapa.png" width="20%" alt="Selecione uma imagem" id="contra"></p>
                    <input type="file" id="contra" name="contra" style="display:;" value="">
                </label>
                </span>
            </div>
        </center>
        <script>
            let photo = document.getElementById('Capa');
            let file = document.getElementById('Capa1');

            photo.addEventListener('click', () => {
                file.click();
            });

            file.addEventListener('change', () => {

                if (file.files.length <= 0) {
                    return;
                }

                let reader = new FileReader();

                reader.onload = () => {
                    photo.src = reader.result;
                }

                reader.readAsDataURL(file.files[0]);
            });
        </script>





        <div class="form-group">
            <label for="Titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" class="form-control"
                   value="<?= isset($titulo) ? $titulo : ''; ?>">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" class="form-control"
                   value="<?= isset($descricao) ? $descricao : ''; ?>">
        </div>
        <div class="form-group">
            <label for="Titulo">Autor</label>
            <input type="text" id="autor" name="autor" class="form-control"
                   value="<?= isset($autor) ? $autor : ''; ?>">
        </div>
        <div class="form-group">
            <label for="genero">Gênero</label>
            <input type="text" id="genero" name="genero" class="form-control"
                   value="<?= isset($genero) ? $genero : ''; ?>">
        </div>
        <button class="btn btn-outline-primary mb-5">Salvar</button>
        <a href="listar-livros" type="button" class="btn btn-outline-danger mb-5">Voltar</a>
    </form>

<?php
endforeach;
include __DIR__.'/../fimHTML.php';?>
