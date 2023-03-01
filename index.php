<?php

require 'classes/Produto.php';

$lista_produtos = (new Produto)->recuperarProdutosDb();

include_once 'includes/index-header.php';
include_once 'includes/index-main.php';
include_once 'includes/index-footer.php';

?>

