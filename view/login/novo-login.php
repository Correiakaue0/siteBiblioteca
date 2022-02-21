<?php include __DIR__.'/../inicioHtmlLogin.php';?>


<form class="row g-3 needs-validation" method="post" action="/novo-login2" >
    <div class="col-md-9">
        <label for="validationCustom01" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome"  name="nome">
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>

    <div class="col-md-4">
        <label for="validationCustomUsername" class="form-label">E-mail:</label>
        <div class="input-group has-validation">
            <span class="input-group-text" id="email" >@</span>
            <input type="email" class="form-control" id="email" name="email">
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationCustom05" class="form-label">Senha:</label>
        <input type="password" class="form-control" id="senha" name="senha" >
        <div class="invalid-feedback">
            Please provide a valid zip.
        </div>
    </div>
    <hr>
    <div class="col-12">
        <br>
        <button class="btn btn-outline-primary" type="submit">Cadastrar</button>
        <a href="/login" class="btn btn-outline-danger" type="submit">Voltar</a>
    </div>
</form>
<?php include __DIR__ . '/../fimHTML.php';?>
