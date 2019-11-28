<?php

session_start();

require("functions/functions.php");

$users = loadUsers();
$products = loadProducts();

if (!$_SESSION['id']) {
  header("Location: login.php");
}

$filtroValor = 1;

if (!empty($_GET['filtro'])) {
  $filtroValor = $_GET['filtro'];
}


require("header/header.php");
?>

<style>
  .conteudoTable {
    max-height: 600px;
    overflow: auto;
  }
</style>

<div class="container">

  <h2 class="pt-3 pb-1 text-center">Visão Geral</h2>

  <form method="GET" class="row justify-content-center mt-4">
    <select name="filtro" onChange="this.form.submit()">
      <option value="1" <?= ($filtroValor == "1") ? "selected='selected'" : ""; ?>>Ver Usuários</option>
      <option value="2" <?= ($filtroValor == "2") ? "selected='selected'" : ""; ?>>Ver Produtos</option>
    </select>
  </form>
  <div class="table-resposive mt-4 d-none <?= ($filtroValor == 1) ? "d-block" : ""; ?>">
    <table class="table table-bordered text-center conteudoTable">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Opcões</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user) : ?>

          <tr>
            <td><?= $user['nome'] ?></td>
            <td><?= $user['email'] ?></td>
            <td>
              <a href="editUser.php" class="btn btn-warning m-1">Editar</a>
              <a href="deleteUser.php?id=<?= $user['id'] ?>" class="btn btn-danger m-1">Excluir</a>
            </td>
          </tr>

        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <div class="table-resposive mt-3 conteudoTable d-none <?= ($filtroValor == 2) ? "d-block" : ""; ?>">

    <table class="table table-bordered text-center align-items-center">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Preço</th>
          <th>Imagem</th>
          <th>Opcões</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($products as $product) : ?>

          <tr>
            <td class="pt-5 pt-md-4"><?= $product['nome'] ?></td>
            <td class="pt-5 pt-md-4"><?= $product['descricao'] ?></td>
            <td class="pt-5 pt-md-4"><?= $product['preco'] ?></td>
            <td class="pt-4 pt-md-2"><img src="img/<?= $product['imagem'] ?>" height="50"></td>
            <td>
              <a href="editProduct.php?id=<?=base64_encode($product['id'])?>" class="btn btn-warning m-1">Editar</a>
              <a href="deleteProduct.php?id=<?= $product['id'] ?>" class="btn btn-danger m-1">Excluir</a>
            </td>
          </tr>

        <?php endforeach ?>

      </tbody>
    </table>

  </div>

</div>

</body>

</html>