<?php

// FUNCTION IN USERS

define('ARQUSER', './json/users.json');
define('ARQPROD', './json/products.json');

// CARREGAR O ARQUIVO JSON USERS

function loadUsers()
{
    $usersJson = file_get_contents(ARQUSER);

    return  json_decode($usersJson, true);
}

// FUNCTION PARA CRIAR NOVOS USUÁRIOS

function newUser($nome, $email, $senha)
{
    $createdUsers = loadUsers();

    if (!empty($createdUsers)) {
        $id = (end($createdUsers)['id']) + 1;
    } else {
        $createdUsers = [];
        $id = '1';
    }

    $user = [
        'id' => $id,
        'nome' => $nome,
        'email' => $email,
        'senha' => password_hash($senha, PASSWORD_DEFAULT)
    ];

    array_push($createdUsers, $user);

    $createdUsers = json_encode($createdUsers);

    return file_put_contents(ARQUSER, $createdUsers);
}

// CHECK EMAIL REPEATED

function checkEmail ($email){
    $createdUsers = loadUsers();
     foreach($createdUsers as $user){
         if ($user['email'] == $email) {
             return true;
         }
     }

}

// FUCNTION PARA LOGAR 

function loginUser($email, $senha)
{
    $createdUsers = loadUsers();

    foreach ($createdUsers as $users) {
        if ($users['email'] == $email && password_verify($senha, $users['senha'])) {
            return $users['id'];
        }
    }
}

// FUNCTION IN PRODUCTS

// CARREGAR O ARQUIVO JSON PRODUCTS

function loadProducts()
{
    $productsJson = file_get_contents(ARQPROD);

    return  json_decode($productsJson, true);
}

// FUNCTION PARA CADASTRAR PRODUTO

function newProduct($nomeProd, $preco, $imagem, $descricao)
{
    $createdProducts = loadProducts();

    if (!empty($createdProducts)) {
        $id = (end($createdProducts)['id']) + 1;
    } else {
        $createdProducts = [];
        $id = '1';
    }

    $product = [
        'id' => $id ,
        'nome' => $nomeProd,
        'descricao' => $descricao,
        'preco' => $preco ,
        'imagem' => 'img/'.$imagem
    ];

    array_push($createdProducts , $product);

    $createdProducts = json_encode($createdProducts);

    return file_put_contents(ARQPROD, $createdProducts);
}
