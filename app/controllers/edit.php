<?php
    include_once('../helpers/db.php');
    
// utiliza a função empty para saber se a variavel está vazia
    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM produtos WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $cod_produto = $user_data['id'];
                $nome_produto = $user_data['nome_produto'];
                $valor = $user_data['valor'];
            }
        }
        else
        {
            header('Location: ../views/index.php');
        }
    }
    else
    {
        header('Location: ../views/index.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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

            <h5 class="h2 modal-title">Edite seu produto</h5>

            <div class="container mt-3 ">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                        <form action="saveEdit.php" method="POST">
                            <tbody>
                                <tr>
                                    <td><input  class="form-control rounded-4 shadow-sm" name="nome_produto" id="nome_produto" type="text" value=<?php echo $nome_produto;?>></td>
                                    <td><input  class="form-control rounded-4 shadow-sm" name="valor" id="valor" type="number" value=<?php echo $valor;?>></td>
                                    <td>
                                        <input type="hidden" name="id" value=<?php echo $id;?>>
                                        <button type="submit" name="update" id="submit" class="btn btn-sm btn-primary d-inline text-dark bg-primary-subtle border rounded-4 shadow-sm">Aplicar Edição</button>
                                    </td>
                                </tr>
                            </tbody>
                        </form>
                  </table>
            </div>
        </div>
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

