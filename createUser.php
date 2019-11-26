<?php

session_start();

require("functions/functions.php");

$erroEmail = false;
$erroSenha = false;
$erroNome = false;


if ($_POST) {
    
    if (empty($_POST['nome-cadastro'])) {
        $erroNome = true;
    }

    if (empty($_POST['email-cadastro'])) {
        $erroEmail = true;
    }

    if (strlen($_POST['senha-cadastro']) < 6) {
        $erroSenha = true;
    }

    if ($erroNome == false && $erroEmail == false && $erroSenha == false) {
        $nome = $_POST['nome-cadastro'];
        $email = $_POST['email-cadastro'];
        $senha = $_POST['senha-cadastro'];
        newUser($nome, $email, $senha);
        header("Location: index.php");
    }
}

require("header/header.php");
?>

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

<?php
require("footer/footer.php");
?>