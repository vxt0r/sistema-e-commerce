<?php

require 'Pedido.php';
require 'carrinho.php';


$forma = (new Carrinho)->formaPagamento($_POST['pagamento']);
$pedido = new Pedido($produtos,$forma,$_POST['total']);
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu pedido</title>
</head>
<body>
    <h1>Pedido efetuado com sucesso</h1>
    <span>Detalhes: </span><br>
    <?php foreach($pedido->__get('produtos') as $produto){?>
        <span>Produto: <?php echo $produto->__get('nome')?></span> -
        <span>Preço Unitário: <?php echo $produto->__get('preco')?></span> -
        <span>Quantidade: <?php echo $produto->__get('qtd')?></span><br>
    <?php } ?>
        <span>Forma de pagamento: <?php echo $pedido->__get('forma_pagamento')?></span><br>
        <span>Total: <?php echo $pedido->__get('total')?></span><br><br>

        <a href="index.php">Voltar pra página principal</a><br>
    
    
</body>
</html>