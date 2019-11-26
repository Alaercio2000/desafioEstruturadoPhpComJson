<?php

session_start();

require("functions/functions.php");

$users = loadUsers();
$products = loadProducts();

if ($_SESSION['id']) { } else {
  header("Location: login.php");
}

require("header/header.php");
?>

<style>
  .conteudoTable{
    max-height: 450px;
    overflow: auto;
  }
  table tr {
    height: 10px;
    overflow: auto;
  }
</style>

<div class="container">

  <h2 class="pt-3 pb-1 text-center">Visão Geral</h2>

  <form method="post" class="row justify-content-center mt-4" onChange="this.form.submit()">
    <select name="filtro" id="filtro">
      <option value="users">Ver Usuários</option>
      <option value="products">Ver Produtos</option>
    </select>
  </form>

  <div class="table-resposive mt-4 d-none">
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
              <a href="deleteUser.php" class="btn btn-danger m-1">Excluir</a>
            </td>
          </tr>

        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <div class="table-resposive mt-3 conteudoTable">

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
            <td class="pt-4 pt-md-2"><img src="<?= $product['imagem'] ?>" height="50"></td>
            <td>
              <a href="editProduct.php" class="btn btn-warning m-1">Editar</a>
              <a href="deleteProduct.php" class="btn btn-danger m-1">Excluir</a>
            </td>
          </tr>

        <?php endforeach ?>

      </tbody>
    </table>

  </div>



</div>


<?php require("footer/footer.php") ?>