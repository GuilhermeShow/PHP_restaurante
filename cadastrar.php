<?php
require("./db/conn.php");
require("./models/Produto.php");
include("./repositorio/ProdutosRepositorios.php");


if(isset($_POST["submit"])) {
    $produto = new ProdutoModelo(null, $_POST["prato"], $_POST["descricao"] ,$_POST["categoria"], $_POST["imagem"], $_POST["preco"]);

    $dados = new ProdutosRepositorios($pdo);
    $dados->salvar($produto);
    header("Location: admin.php");
}

?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Roboto:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    
    <link rel="stylesheet" href="./assets/reset.css">
    <link rel="stylesheet" href="./assets/style/cadastrar.css">
    <title>Onse restarant - cadastrar</title>
</head>
<body class="fundo">

<?php include("./cabecario.php");?>

<div class="container">

    <div class="container conteudo">
        <div class="row">
            <div class="col-sm">
                <img class="w-50" src="./assets/imagem/form.svg" alt="">
            </div>
            <div class="col-sm">
            <form method="POST">
                <h2 class="prato_titulo">Cadastre um prato aqui</h2>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Prato</label>
                    <input type="text" name="prato" class="form-control" placeholder="Digite nome do prato">
                    </div>
                    <div class="form-group col-md-6">
                    <label >Preço</label>
                    <input type="text" name="preco" class="form-control" placeholder="22,90">
                    </div>
                </div>
                <div class="form-group">
                    <label >Imagem</label>
                    <input type="file" name="imagem" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Descrição</label>
                    <textarea name="descricao" placeholder="Decrição do prato" rows="4" class="form-control"></textarea>
                </div>
               
                    
                    <div class="form-group">
                    <label for="inputEstado">Categoria</label>
                    <select id="inputEstado" name="categoria" class="form-control">
                        <option selected>Escolher...</option>
                        <option value="cafe">Café</option>
                        <option value="almoco">Almoço</option>
                        <option value="lanche">Lanche</option>
                    </select>
                    </div>
                  
                
                <div class="form-group">
                    
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Cadastrar prato</button>
            </form>
            </div>
        </div>
</div>

</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>