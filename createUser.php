<?php require("functions/functions.php");

$erroEmail = false;
$erroSenha = false;
$erroNome = false;


if ($_POST) {
    if (!empty($_POST['nome-cadastro'])) {
        $erroNome = false;
    } else {
        $erroNome = true;
    }

    if (!empty($_POST['email-cadastro'])) {
        $erroEmail = false;
    } else {
        $erroEmail = true;
    }

    if (strlen($_POST['senha-cadastro']) > 5) {
        $erroSenha = false;
    } else {
        $erroSenha = true;
    }

    if ($erroNome == false && $erroEmail == false && $erroSenha == false) {
        $nome = $_POST['nome-cadastro'];
        $email = $_POST['email-cadastro'];
        $senha = $_POST['senha-cadastro'];
        newUser($nome , $email , $senha);
    }
}

?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Cadastro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h3 class="text-center py-5">Seja Bem-vindo</h3>
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="post">

                    <div class="form-group">
                        <label for="nome" class="pl-2">Nome</label>
                        <input required type="nome" class="form-control <?= ($erroNome === true) ? "is-invalid" : ""; ?>" name="nome-cadastro" id="nome" placeholder="Digite seu nome">
                        <div class="invalid-feedback pl-2">
                            Nome invalido
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="pl-2">Email</label>
                        <input required type="email" class="form-control <?= ($erroEmail === true) ? "is-invalid" : ""; ?>" name="email-cadastro" id="email" placeholder="Digite seu email">
                        <div class="invalid-feedback pl-2">
                            Email invalido
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="senha" class="pl-2">Senha</label>
                        <input required type="password" class="form-control <?= ($erroSenha === true) ? "is-invalid" : ""; ?>" name="senha-cadastro" id="senha" placeholder="Digite seu email">
                        <div class="invalid-feedback pl-2">
                            Senha invalida , a senha deve ter mais de 6 caracteres
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary w-100 mt-3">Entrar</button>
                    </div>
                    <h5 class="py-4 pl-3">Já tem cadastro ?<a class="pl-2" href="login.php">Login</a></h5>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>