<?php

require 'servicos/Carrinho.php';
require 'servicos/Pedido.servico.php';


session_start();

$produtos = [];

foreach($_SESSION['pedido'] as $produto){
    $produtos[] = unserialize($produto);
}

$forma = (new PedidoServico)->formaPagamento($_POST['pagamento']);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="row bg-dark text-light">
    <section class="row col-10 mx-auto mt-5 gy-3">
        <h1 class="col-10 text-center">Pedido efetuado com sucesso</h1>
        <span class="col-10">Detalhes: </span><br>
        <?php foreach($pedido->__get('produtos') as $produto){?>
            <span class="col-10">Produto: <?php echo $produto->__get('nome')?></span> 
            <span class="col-10">Preço Unitário: <?php echo $produto->__get('preco')?></span> 
            <span class="col-10">Quantidade: <?php echo $produto->__get('qtd')?></span><br>
        <?php } ?>
            <span class="col-10">Forma de pagamento: <?php echo $pedido->__get('forma_pagamento')?></span><br>
            <span class="col-10">Total: <?php echo $pedido->__get('total')?></span><br><br>

            <a href="index.php" class="col-10 text-light">Voltar pra página principal</a><br>
    </section>
    
</body>
</html>