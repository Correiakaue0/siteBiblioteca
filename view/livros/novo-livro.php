<?php include __DIR__.'/../inicioHTML.php';?>

    <form action="/salvar-livro<?= isset($livro) ? '?id='.$livro->getId() : '' ?>" method="post"
    class="container" enctype="multipart/form-data">
        <center>
            <div class="form-group">
                <label for="uploadAvatar" >
                    <p style="display:block" class="btn   btn-sm mt-3"><img src="http://cdn.onlinewebfonts.com/svg/img_150954.png" width="30%" alt="Selecione uma imagem" id="ImgIcon"></p>
                    <input type="file" id="uploadAvatar" name="uploadAvatar" style="display:;" value="<?= isset($livro) ? $livro->getImagem() : ''; ?>">
                </label>
            </div>
        </center>

        <script>
            let photo = document.getElementById('ImgIcon');
            let file = document.getElementById('uploadAvatar');

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
        </script><!-script de trocar imagem->




        <div class="form-group">
            <label for="Titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" class="form-control"
                   value="<?= isset($livro) ? $livro->getTitulo() : ''; ?>">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" class="form-control"
                   value="<?= isset($livro) ? $livro->getDescricao() : ''; ?>">
        </div>
        <div class="form-group">
            <label for="Titulo">Autor</label>
            <input type="text" id="autor" name="autor" class="form-control"
                   value="<?= isset($livro) ? $livro->getAutor() : ''; ?>">
        </div>
        <button class="btn btn-outline-primary mb-5">Salvar</button>
        <a href="listar-livros" type="button" class="btn btn-outline-danger mb-5">Voltar</a>
    </form>

<?php  include __DIR__.'/../fimHTML.php';?>