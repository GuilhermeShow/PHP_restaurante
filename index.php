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
    <link rel="stylesheet" href="./assets/style/cabecario.css">
    <link rel="stylesheet" href="./assets/style/card.css">
    <link rel="stylesheet" href="./assets/style/footer.css">
    <title>Onse restarant</title>
</head>
<body>
<?php include("./cabecario.php");
require("./db/conn.php");
require("./models/Produto.php");
include("./repositorio/ProdutosRepositorios.php");

$cardapio = new ProdutosRepositorios($pdo);

$cafe = $cardapio->opcoes("cafe");
$almoco = $cardapio->opcoes("almoco");
$lanche = $cardapio->opcoes("lanche");

?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>

 <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./assets/imagem/cafe.svg" alt="Primeiro Slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./assets/imagem/almoco.svg" alt="Segundo Slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./assets/imagem/janta.svg" alt="Terceiro Slide">
    </div>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
</div>
<div class="container">
<h2 class="mt-4 mb-4 subtitulo">Café</h2>
<div class="corpo">
  
  <?php foreach($cafe as $cof):?>
    <div class="card container p-0" style="width: 18rem;">
  <img class="card-img-top imagem" src="<?=$cof->getImagem()?>" alt="Imagem de capa do card">
  <div class="card-body">
    <h5 class="card-title"><?=$cof->getPrato()?></h5>
    <p class="card-text descricao"><?=$cof->getDescricao()?></p>
    <h6 class="card-title preco">R$ <?=$cof->getPreco()?></h6>
  </div>
</div>
    <?php endforeach?>
</div>
</div>
<hr>
<div class="container">
<h2 class="mt-4 mb-4 subtitulo">Almoço</h2>
<div class="corpo">
  
  <?php foreach($almoco as $alm):?>
    <div class="card container p-0" style="width: 18rem;">
  <img class="card-img-top imagem" src="<?=$alm->getImagem()?>" alt="Imagem de capa do card">
  <div class="card-body">
    <h5 class="card-title"><?=$alm->getPrato()?></h5>
    <p class="card-text descricao"><?=$alm->getDescricao()?></p>
    <h6 class="card-title preco">R$ <?=$alm->getPreco()?></h6>
  </div>
</div>
<hr>
    <?php endforeach?>
</div>
</div>


<div class="container">
<h2 class="mt-4 mb-4 subtitulo">Lanches</h2>
<div class="corpo">
  
  <?php foreach($lanche as $lan):?>
    <div class="card container p-0" style="width: 18rem;">
  <img class="card-img-top imagem" src="<?=$lan->getImagem()?>" alt="Imagem de capa do card">
  <div class="card-body">
    <h5 class="card-title"><?=$lan->getPrato()?></h5>
    <p class="card-text descricao"><?=$lan->getDescricao()?></p>
    <h6 class="card-title preco">R$ <?=$lan->getPreco()?></h6>
  </div>
</div>
<hr>
    <?php endforeach?>
</div>
</div>
  <?php
  include("./footer.php");
  ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>