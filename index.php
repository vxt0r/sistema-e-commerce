<?php

require 'classes/Produto.php';

$lista_produtos = (new Produto)->recuperarProdutosDb();

include_once 'includes/index-view.php';


?>

