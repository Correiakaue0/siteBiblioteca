<?php include __DIR__.'/../inicioHTMLLogin.php';?>
        <form action="/realiza-login" method="post">
            <div class="">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class=" mb-2">
                <label for="password">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control">
            </div>
            <center><button class="btn btn-outline-success">Entrar</button>
           <a href="/novo-login" class="btn btn-outline-primary">Cadastrar</a></center>
        </form>
    </div>
</div>
<?php include __DIR__.'/../fimHTML.php';?>
