<?php

require'Conection.php';

$codigo = filter_input(INPUT_POST,'cod_produto');
$nome = filter_input(INPUT_POST,'nome_produto');
$preco = filter_input(INPUT_POST,'preco_produto');

$sql = $pdo->prepare("INSERT INTO produtos (cod_produto, nome_produto, preco_produto) VALUES (:cod_produto, :nome_produto, :preco_produto)");
$sql->bindValue(':cod_produto', $codigo);
$sql->bindValue(':nome_produto', $nome);
$sql->bindValue(':preco_produto', $preco);
$sql->execute();
