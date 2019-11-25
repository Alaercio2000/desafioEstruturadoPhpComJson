<?php

// FUNCTION IN USERS

define('ARQUSER' , './json/users.json');
define('ARQPROD' , './json/products.json');

// CARREGAR O ARQUIVO JSON

function loadUsers (){
    $usersJson = file_get_contents(ARQUSER);

    return  json_decode($usersJson , true);
}

// FUNCTION PARA CRIAR NOVOS USUÁRIOS
function newUser($nome , $email , $senha){
    $createdUsers = loadUsers();

    if (!empty($createdUsers)) {
        $id = (end($createdUsers)['id']) + 1 ;
        
    }else {
        $createdUsers = [];
        $id = '1';
    }

    $user = [
        'id' => $id ,
        'nome' => $nome ,
        'email' => $email ,
        'senha' => password_hash($senha , PASSWORD_DEFAULT)
    ];

    
    array_push($createdUsers , $user);

    $createdUsers = json_encode($createdUsers);

    return file_put_contents(ARQUSER , $createdUsers);
}

// FUCNTION PARA LOGAR 
function loginUser ($email , $senha){
    $createdUsers = loadUsers();

    foreach($createdUsers as $users){
        if ($users['email'] == "$email" && password_verify($senha , $users['senha']) == true) {
            $_SESSION['id'] = $users['id'];
            return true;
        }
    }
}