<?php

// utiliza a função empty para saber se a variavel está vazia
    if(!empty($_GET['id']))
    {
        include_once('../helpers/db.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM produtos WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM produtos WHERE id=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }

    header("Location: ../views/index.php");
   
?>