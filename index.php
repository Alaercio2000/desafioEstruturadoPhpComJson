<?php

session_start();

require("functions/functions.php");

$users = loadUsers();

if ($_SESSION['id']) { } else {
  header("Location: login.php");
}

require("header/header.php");
?>

<div class="container">

  <h2 class="pt-3 pb-1 text-center">Visão Geral</h2>

  <form method="post" class="row justify-content-center mt-4" onChange="this.form.submit()">
    <select name="filtro" id="filtro">
      <option value="users">Ver Usuários</option>
      <option value="products">Ver Produtos</option>
    </select>
  </form>

  <div class="table-resposive mt-4">
    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Opcões</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $users) : ?>

          <tr>
            <td><?= $users['nome'] ?></td>
            <td><?= $users['email'] ?></td>
            <td>
              <a href="editUser.php" class="btn btn-warning">Excluir</a>
              <a href="deleteUser.php" class="btn btn-danger">Excluir</a>
            </td>
          </tr>

        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  


</div>


<?php require("footer/footer.php") ?>