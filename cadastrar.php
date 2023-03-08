<?php

require'Conection.php';

$codigo = filter_input(INPUT_POST,'cod_produto');
$nome = filter_input(INPUT_POST,'nome');
$preco = filter_input(INPUT_POST,'preco');

$sql = $pdo->prepare("INSERT INTO produtos (cod_produto, nome, preco) VALUES (:cod_produto, :nome, :preco)");
$sql->bindValue(':cod_produto', $codigo);
$sql->bindValue(':nome', $nome);
$sql->bindValue(':preco', $preco);
$sql->execute();
