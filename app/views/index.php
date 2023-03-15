<?php

  
  include_once('../helpers/db.php');
  
  if(isset($_POST['submit']))
  {
  $cod_produto = $_POST['cod_produto'];
  $nome_produto = $_POST['nome_produto'];
  $valor = $_POST['valor'];
    
  $resultado = mysqli_query($conexao, " INSERT INTO produtos(id, nome_produto, valor) VALUES ($cod_produto, '$nome_produto', $valor)");
  }



  $sql = "SELECT * FROM produtos";
  $result = $conexao->query($sql);



  if(!empty($_GET['search']))
  {
      $data = $_GET['search'];
      $sql = "SELECT * FROM produtos WHERE id LIKE '%$data%' or nome_produto LIKE '%$data%' or valor LIKE '%$data%' ORDER BY id DESC";
  }
  else
  {
      $sql = "SELECT * FROM produtos ORDER BY id DESC";
  }
  $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>CRUD-PHP</title>
    <style>.btn:hover{opacity: 85%;} </style>
</head>
<body>

    <div class="container border mt-5 mb-3 rounded-4 shadow "> 

        <div class="row">
            <div class="col-sm-8 mt-3 mb-1">
                <h1 class="fs-1 text-dark  mx-4"><strong>Olá usuário</strong></h1>
                <h3 class="fs-3 text-dark pt-3 mx-4 " >Bem-vindo ao Sistema CRUD</h3>
            </div>

            <div class="col-sm-4">
                
            </div>
        </div>
        
        <div class="shadow-sm p-2 d-inline text-dark bg-danger-subtle rounded-4 mx-4">  
            <strong>Gerenciamento de Produtos</strong> 
        </div>

        <div class="container mt-5 border rounded-4 mb-2"> 

            <div class="mt-3">
                <button class="btn btn-primary p-2 d-inline text-dark bg-success-subtle border rounded-4 mx-3 d-block shadow-sm " data-toggle="modal" data-target="#modalExemplo" id="btn_add" > Adicionar Produtos</button>
                
                <div class="box-search row mt-3 mx-1">
                  <div class="col-sm-8"><input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar"></div>
                  <div class="col-sm-4"><button onclick="searchData()" class="btn btn-outline-success my-2 my-sm-0 rounded-4 shadow-sm"></div>
                </div>

            </button>
            
        </div>
            
            <div class="container mt-3 ">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">COD</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        while($user_data = mysqli_fetch_assoc($result)){
                          echo "<tr>";
                            echo "<td>".$user_data['id']."</td>";
                            echo "<td>".$user_data['nome_produto']."</td>";
                            echo "<td>".$user_data['valor']."</td>";
                            echo "<td>
                                    <a class='btn btn-sm btn-primary d-inline text-dark bg-primary-subtle border rounded-4 shadow-sm' href='../controllers/edit.php?id=$user_data[id]' title='Editar'>Editar</a> 
                                    <a class='btn btn-sm btn-primary d-inline text-dark bg-danger-subtle border rounded-4 shadow-sm' href='../controllers/delete.php?id=$user_data[id]' title='Deletar'>Deletar</a>
                                  </td>";
                          echo"</tr>";
                        }
                      ?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div> 

    <form method="post" action="index.php">
                        
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
                <label for="valor"><strong>Preço do produto</strong></label>
                <input class="form-control" name="valor" id="valor" type="number" placeholder="Insira o preço do produto" aria-label="default input example">
              </div>
            </div>
            <div class="modal-footer w-100">
              <button type="submit" name="submit" id="submit" class="btn btn-primary  w-100 p-2 d-inline text-dark bg-primary-subtle border rounded-4 mx-3 d-block shadow-sm">Adicionar produto</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.js"></script>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = '../views/index.php?search='+search.value;
    }
</script>
</html>