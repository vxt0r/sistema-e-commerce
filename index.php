<?php

require_once 'vendor/autoload.php';

use classes\Produto;

session_start();

if(isset($_GET['finalizado'])){
    session_destroy();
    header('location: index.php');
}

$lista_produtos = (new Produto)->recuperarProdutosDb();

include_once 'includes/index-view.php';


?>

