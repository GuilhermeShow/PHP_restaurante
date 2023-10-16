<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Roboto:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    
    <link rel="stylesheet" href="./style/reset.css">
    <link rel="stylesheet" href="./assets/style/admin.css">
    <title>Onse restarant</title>
</head>
<body>
<?php include("./cabecario.php");
require("./db/conn.php");
require("./models/Produto.php");
include("./repositorio/ProdutosRepositorios.php");

$teste = new ProdutosRepositorios($pdo);
$res = $teste->listar();


?>
<div class="container-fluid tabela">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Prato</th>
      <th scope="col">Descrição</th>
      <th scope="col">Categoria</th>
      <th scope="col">Preço</th>
      <th scope="col">Editar</th>
      <th scope="col">Deletar</th>
    </tr>
    
  </thead>
  <tbody>
    <tr>
      <?php 
      foreach ($res as $dados) :
      ?>
      <td><?=$dados->getPrato();?></td>
      <td><?=$dados->getDescricao();?></td>
      <td><?=$dados->getCategoria();?></td>
      <td><?=$dados->precoFormatado();?></td>
      <td><a href="edite.php?id=<?=$dados->getId()?>"><button type="button" class="btn btn-primary">Editar</button></a></td>
      <td>
        <form action="excluir-produto.php" method="POST">
          <input type="hidden" name="id" value="<?=$dados->getId();?>">
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
<hr>
<a href="cadastrar.php"><button type="button" class="btn btn-primary">Cadastrar prato</button></a>
</div>
  <?php
  include("./footer.php");
  ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>