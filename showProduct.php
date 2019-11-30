<?php

session_start();

require("functions/functions.php");

$erroId = true;

$id = base64_decode($_GET['id']);

$products = loadProducts();

if (!empty($products)) {
    foreach ($products as $product) {
        if ($product['id'] == $id) {
            $nome = $product['nome'];
            $descricao = $product['descricao'];
            $preco = $product['preco'];
            $img = $product['imagem'];
            $erroId = false;
        }
    }
}

if (!$_SESSION['id']) {
    header("Location: login.php");
}

if (!$id) {
    header("Location: index.php?filtro=2");
} else {
    if ($erroId) {
        header("Location: index.php?filtro=2");
    }
}

require("header/header.php");
?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="col offset-3 pt-5">
                <img class="w-75" src="img/<?= $img ?>">
            </div>
        </div>
        <div class="col">
            <h3 class="pt-4"><?= $nome ?></h3>
            <p class="pb-5"><?= $descricao ?></p>
            <h5 class="pb-5">R$ <?= $preco ?></h5>
            <a href="#" class="btn btn-success mr-3">Comprar</a>
            <a href="index.php?filtro=2" class="btn btn-info">Ver outros produtos</a>
        </div>
    </div>
</div>

</body>

</html>