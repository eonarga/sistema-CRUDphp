<?php
    // isset -> serve para saber se uma variável está definida
    include_once('../helpers/db.php');
    if(isset($_POST['update']))
    {
        $cod_produto = $_POST['id'];
        $nome_produto = $_POST['nome_produto'];
        $valor = $_POST['valor'];
        
        $sqlInsert = "UPDATE produtos
        SET id=$cod_produto, nome_produto='$nome_produto', valor=$valor
        WHERE id=$cod_produto";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: ../views/index.php');

?>