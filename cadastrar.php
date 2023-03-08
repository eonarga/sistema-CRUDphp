<?php

require'Conection.php';

$codigo = filter_input(INPUT_POST,'code');
$nome = filter_input(INPUT_POST,'nome');
$preco = filter_input(INPUT_POST,'preco');

$sql = $pdo->prepare("INSERT INTO produtos (code, nome, preco) VALUES (:codigo, :nome, :preco)");
$sql->bindValue(':code', $codigo);
$sql->bindValue(':nome', $nome);
$sql->bindValue(':preco', $preco);
$sql->execute();
