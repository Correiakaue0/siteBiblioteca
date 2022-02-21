<?php include __DIR__.'/../inicioHTML.php';?>
    <form action="/salvar-livro<?= isset($livro) ? '?id='.$livro->getId() : '' ?>" method="post">
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" class="form-control"
            value="<?= isset($livro) ? $livro->getDescricao() : ''; ?>">
        </div>
        <button class="btn btn-outline-primary">Salvar</button>
        <a href="listar-livros" type="button" class="btn btn-outline-danger">Voltar</a>
    </form>
<?php  include __DIR__.'/../fimHTML.php';?>