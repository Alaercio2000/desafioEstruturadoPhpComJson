<?php

session_start();

require("functions/functions.php");

if ($_SESSION['id']) { } else {
    header("Location: login.php");
}

$id = $_GET['id'];


$createdProducts = loadProducts();

foreach ($createdProducts as $key => $user) {
    if ($user['id'] == $id) {
        array_splice($createdProducts, $key, 1);

        $createdProducts = json_encode($createdProducts);
        file_put_contents(ARQPROD, $createdProducts);
    }
}

header("Location: index.php?filtro=2");
