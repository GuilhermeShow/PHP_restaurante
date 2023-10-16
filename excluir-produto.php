<?php

require("./db/conn.php");
require("./models/Produto.php");
include("./repositorio/ProdutosRepositorios.php");

$teste = new ProdutosRepositorios($pdo);
$teste->deletar($_POST["id"]);

header("Location: admin.php");