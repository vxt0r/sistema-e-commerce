<?php

require_once 'vendor/autoload.php';

use classes\Produto;
use classes\Pedido;

session_start();

$pedido = new Pedido($_SESSION['carrinho'],$_POST['pagamento'],$_POST['total']);

require 'includes/pedido-view.php';



