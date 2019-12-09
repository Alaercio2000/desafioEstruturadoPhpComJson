<?php
session_start();

if (!$_SESSION['id']) {
    header("Location: login.php");
}

require("functions/functions.php");

$erroNome = false;
$erroPreco = false;
$erroImg = false;
$erroPrecoNum = false;

$nome = "";
$descricao = "";
$preco = "";

if (!empty($_POST)) {

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    if (empty($nome)) {
        $erroNome = true;
    }

    if (empty($preco)) {
        $erroPreco = true;
    }else{
        $preco = str_replace(",",".", $preco);
        if (!is_numeric($preco)) {
            $erroPrecoNum = true;
        }
    }
    if (($_FILES['imagem']['error']) != 0) {
        $erroImg = true;
    }

    if (!$erroNome && !$erroPreco && !$erroImg) {
        $nomeImg = base64_encode(rand(0, 9999)) . $_FILES['imagem']['name'];

        move_uploaded_file($_FILES['imagem']['tmp_name'], 'img/' . $nomeImg);

        newProduct($nome, $preco, $nomeImg, $descricao);
        header("Location: index.php?filtro=2");
    }
}


require("header/header.php");
?>

<div class="container">
    <h2 class="text-center pt-4">Adicionar Produtos</h2>
    <div class="row justify-content-center">
        <form method="POST" class="col-6" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nameProduct">Nome Produto</label>
                <input required type="text" class="form-control <?= ($erroNome) ? "is-invalid" : ""; ?>" name="nome" id="nameProduct" placeholder="Digite o nome do produto" value="<?= $nome ?>">
                <div class="invalid-feedback pl-2">
                    Digite o nome do seu produto
                </div>
            </div>
            <div class="form-group">
                <label for="descriptionProduct">Descrição do produto</label>
                <textarea class="form-control" name="descricao" id="descriptionProduct" rows="10" placeholder="Digite mais a respeito do produto"><?= $descricao ?></textarea>
            </div>
            <div class="form-group">
                <label for="priceProduct">Preço</label>
                <input required type="text" class="form-control <?= ($erroPreco) ? "is-invalid" : ""; ?>" name="preco" id="priceProduct" placeholder="Digite o preço do produto" pattern="[0-9.,]{1,}" value="<?= $preco ?>">
                <div class="invalid-feedback pl-2">
                    Digite o preço do seu produto
                </div>
                <div class="d-none mt-3 alert alert-danger alert-dismissible fade show <?= ($erroPrecoNum) ? "d-block" : "" ?>" role="alert">
                    Digite um preço valido
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="d-block">Escolhar sua imagem</label>
                <input id="image" required type="file" name="imagem">
            </div>
            <div class="d-none alert alert-danger alert-dismissible fade show <?= ($erroImg) ? "d-block" : "" ?>" role="alert">
                Não tem foto selecionada!!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <button type="submit" class="btn btn-secondary w-100 my-3">Cadastrar</button>
        </form>
    </div>
</div>


</body>

</html>