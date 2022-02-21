  <?php  include __DIR__.'/../inicioHTML.php'?>
    <a href="/novo-livro" class="btn btn-outline-primary mb-2">
        Novo Livro
    </a>

    <ul class="list-group">
        <?php foreach ($livros as $livro): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $livro->getDescricao(); ?>
                <sapan>
                    <a href="/alterar-livro?id=<?= $livro->getId();  ?>" class="btn btn-outline-info">Alterar</a>
                    <a href="/excluir-livro?id=<?= $livro->getId();  ?>" class="btn btn-outline-danger"> Excluir </a>
                </sapan>
            </li>
        <?php endforeach; ?>
    </ul>

  <?php  include __DIR__.'/../fimHTML.php'?>