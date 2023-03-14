<?php
  include_once('../helpers/db.php');
  if(isset($_POST['submit']))
  {
  $cod_produto = $_POST['cod_produto'];
  $nome_produto = $_POST['nome_produto'];
  $valor = $_POST['valor'];
    
  $result = mysqli_query($conexao, " INSERT INTO produtos(id, nome_produto, valor) VALUES ($cod_produto, '$nome_produto', $valor)");
  }

  header("Location: ../views/index.php");
?>

