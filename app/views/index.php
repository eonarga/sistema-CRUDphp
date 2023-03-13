<?php

  include_once('Conection.php');

  $sql = "SELECT * FROM produtos ORDER BY id DESC";

  $result = $pdo->query($sql);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
    <style>.btn:hover{opacity: 85%;} </style>
</head>
<body>

    <div class="container border mt-5 mb-3 rounded-4 shadow "> 
        <div class="row">
            <div class="col-sm-8 mt-3">
                <h1 class="fs-1 text-dark mx-3"><strong>Olá usuário</strong></h1>
                <h3 class="fs-3 text-dark pt-3 mx-3 " >Bem-vindo ao Sistema CRUD</h3>
            </div>

            <div class="col-sm-4 mt-1">
                <img src="log.png" class="rounded float-end mx-3"  alt="logo interface">
            </div>
        </div>
        
        <div class=" shadow-sm p-2 d-inline text-dark bg-danger-subtle  rounded-4 mx-3">
            <strong>Gerenciamento de Produtos</strong> 
        </div>

        <div class="container mt-5 border rounded-4 mb-2"> 

            <div class="mt-3">
                <button class="btn btn-primary p-2 d-inline text-dark bg-success-subtle border rounded-4 mx-3 d-block shadow-sm " data-toggle="modal" data-target="#modalExemplo" id="btn_add" ><img src="Huge-icon2.svg" alt="icon de adionar"> Adicionar Produtos</button>
                
                <form class="form-inline row mt-3 mx-1">
                    <div class="col-sm-8"><input class="form-control mr-sm-2 rounded-4 shadow-sm" type="search" placeholder="Pesquisar" aria-label="Pesquisar"></div>
                    <div class="col-sm-4"><button class="btn btn-outline-success my-2 my-sm-0 rounded-4 shadow-sm" type="submit">Pesquisar</button></div>
                  </form>

                  <div class="dropdown mt-3 mx-3">
                    <button class="p-1 btn btn-outline-dark rounded-3 dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Classificar
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Classificar ordem crescente</a>
                      <a class="dropdown-item" href="#">Classificar ordem decrescente</a>
                    </div>
                  </div>
            </div>
            
            <div class="container mt-3 ">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">COD</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        while($user_data = mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            echo "<tr>" . $user_data['cod_produto']."</tr>";
                            echo "<tr>" . $user_data['nome_produto']."</tr>";
                            echo "<tr>" . $user_data['preco_produto']."</tr>";
                            echo "<td>
                            <a class='btn btn-sm btn-primary' href='edit.php?id_produto=$user_data[id_produto]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='delete.php?id_produto=$user_data[id_produto]' title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            </td>";
                          echo "</tr>";
                        }
                      ?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div> 

    <form method="post" action="cadastrar.php">
      <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="h2 modal-title">Cadastre seu produto</h5>
              <button type="button" id="fechaModal" class="btn border  text-white bg-danger rounded-5 shadow-sm" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
              <div class="mt-4">
                <label for="cod_produto"><strong> Código do produto</strong></label>
                <input class="form-control" name="cod_produto" id="cod_produto" type="number" placeholder="Insira o código do produto" aria-label="default input example">
              </div>
              
              <div class="mt-4">
                <label for="nome_produto"><strong>Nome do produto</strong></label>
                <input class="form-control" name="nome_produto" id="nome_produto" type="text" placeholder="Insira o nome do produto" aria-label="default input example">
              </div>

              <div class="mt-4 mb-4">
                <label for="preco_produto"><strong>Preço do produto</strong></label>
                <input class="form-control" name="preco_produto" id="preco_produto" type="number" placeholder="Insira o preço do produto" aria-label="default input example">
              </div>
            </div>
            <div class="modal-footer w-100">
              <button type="input" class="btn btn-primary  w-100 p-2 d-inline text-dark bg-primary-subtle border rounded-4 mx-3 d-block shadow-sm">Adicionar produto</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>