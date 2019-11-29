<?php

// FUNÇÕES FEITAS PARA OS USUÁRIOS

define('ARQUSER', './json/users.json');
define('ARQPROD', './json/products.json');

// FUNÇÃO PARA CARREGAR OS USUÁRIOS CADASTRADO

function loadUsers()
{
    $usersJson = file_get_contents(ARQUSER);

    return  json_decode($usersJson, true);
}

// FUNÇÃO PARA CADASTRO DE USUÁRIO

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

// VERIFICANDO SE O EMAIL DO USUÁRIO NÃO É REPETIDO

function checkEmail ($email){
    $createdUsers = loadUsers();
     foreach($createdUsers as $user){
         if ($user['email'] == $email) {
             return true;
         }
     }

}

// FUNÇÃO PARA VALIDAR A ENTRADA DO USUÁRIO

function loginUser($email, $senha)
{
    $createdUsers = loadUsers();

    foreach ($createdUsers as $users) {
        if ($users['email'] == $email && password_verify($senha, $users['senha'])) {
            return $users['id'];
        }
    }
}

// FUNÇÃO PARA EDITAR USUÁRIO

function updateUser($nome , $email , $senha , $id){
    $createdUsers = loadUsers();

    $user = [
        'id' => $id , 
        'nome' => $nome ,
        'email' => $email ,
        'senha' => $senha
    ];

    foreach($createdUsers as $key => $users){
        if ($users['id'] == $id) {
            $createdUsers[$key] = $user;
            $createdUsers = json_encode($createdUsers);
            return file_put_contents(ARQUSER , $createdUsers);
        }
    }
}

// FUNÇÃO PARA PEGAR NOME DO USUÁRIO QUE ENTROU

function nameUser($id){
    $createdUsers = loadUsers();

    foreach($createdUsers as $user){
        if ($user['id'] == $id) {
            return $user['nome'];
        }
    }
}

// FUNÇÕES EM PRODUTOS

// CARREGAR ARQUIVOS JSON COM TODOS OS PRODUTOS

function loadProducts()
{
    $productsJson = file_get_contents(ARQPROD);

    return  json_decode($productsJson, true);
}

// FUNÇÃO PARA CADASTRAR UM NOVO PRODUTO

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
        'imagem' => $imagem
    ];

    array_push($createdProducts , $product);

    $createdProducts = json_encode($createdProducts);

    return file_put_contents(ARQPROD, $createdProducts);
}

// FUNÇÃO PARA EDITAR PRODUTO

function upProducts($nome , $preco , $imagem , $descricao , $id ){
    $createdProducts = loadProducts();

    $product = [
        'id' => $id ,
        'nome' => $nome,
        'descricao' => $descricao,
        'preco' => $preco ,
        'imagem' => $imagem
    ];

    foreach($createdProducts as $key => $value){
        if ($value['id'] == $id) {
            $createdProducts[$key] = $product;
            $createdProducts = json_encode($createdProducts);
            return file_put_contents(ARQPROD , $createdProducts);
        }
    }
}
