<?php

session_start();

require("functions/functions.php");

if (!$_SESSION['id']) {
    header("Location: login.php");
}

$id = $_GET['id'];


$createdUsers = loadUsers();

foreach ($createdUsers as $key => $user) {
    if ($user['id'] == $id) {
        array_splice($createdUsers, $key, 1);

        $createdUsers = json_encode($createdUsers);
        file_put_contents(ARQUSER, $createdUsers);
    }
}

header("Location: index.php?filtro=1");



