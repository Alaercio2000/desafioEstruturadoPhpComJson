<?php 
session_start();

if (!$_SESSION['id']) {
    header("Location: login.php");
}

require("functions/functions.php");

$id = base64_decode($_GET['id']);



require("header/header.php");
?>