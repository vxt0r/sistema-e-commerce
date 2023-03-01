<?php

require 'classes/Produto.php';
require 'classes/Pedido.php';

session_start();

$pedido = new Pedido($_SESSION['carrinho'],$_POST['pagamento'],$_POST['total']);

require 'includes/pedido-header.php';
require 'includes/pedido-main.php';
require 'includes/pedido-footer.php';


