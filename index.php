<?php 

session_start();

if ($_SESSION['id']) {
    
}else{
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboad</title>
</head>
<body>
    Olá
</body>
</html>