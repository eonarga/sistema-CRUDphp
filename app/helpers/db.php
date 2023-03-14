<?php

    $dbHost = 'localhost';
    $dbUsername = 'gabriel';
    $dbPassword = '123456';
    $dbName = 'crud';
    
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

   //  if($conexao->connect_errno)
   //  {
   //      echo "Erro";
   //  }
   //  else
   //  {
   //      echo "Conexão efetuada com sucesso";
   //  }

?>

