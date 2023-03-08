<?php
include "Conection.php";
$produtos = $pdo->query('select * from produtos;')->fetchAll();
$dados = "";
foreach ($produtos as $key => $value) {
    $dados = $dados . "<tr id='tr" . $value['id'] . "'>" .
        "<td>" . $value['id'] . "</td>" .
        "<td>" . $value['cod_produto'] . "</td>" .
        "<td>" . $value['nome'] . "</td>" .
        "<td>" . $value['preco'] . "</td>" .
        "<td>" .
        "<td>" .
        "<div class='btn-group' role='group'>" .
        "<button type='button' onclick='alterar(" . json_encode($value) . ")' type='button' class='btn btn-warning'>" .
        "<i class='fa-solid fa-pen-to-square'> </i> Editar" .
        "</button>" .
        "<button onclick='deleta(" . $value['id'] . ");' type='button' class='btn btn-danger'>" .
        "<i class='fa-solid fa-trash'> </i> Excluir" .
        "</button>" .
        "</div>" .
        "</td>" .
        "</td>" .
        "</tr>";
}
echo $dados;
