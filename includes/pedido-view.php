<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido realizado!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/pedido.css">
</head>
<body class="bg-dark text-white">
    <div class="container">

        <header class="my-5 mx-auto text-center">
            <span class="display-6">Seu pedido foi efetuado com sucesso</span><br>
        </header>

        <main class="my-5 mx-auto">
            <span>Detalhes:</span>
            <ul>
            <?php foreach($pedido->__get('produtos') as $produto){ ?>
                <li class="list-unstyled my-2">
                    <span>Produto: <?php echo $produto->__get('nome')?></span><br> 
                    <span>Preço Unitário: R$<?php echo $produto->__get('preco')?></span><br>  
                    <span>Quantidade: <?php echo $produto->__get('qtd')?></span><br>
                    <span>Sub-total: <?php echo $produto->__get('preco') * $produto->__get('qtd')?></span>
                </li><br>
        <?php } ?>
                    <span class="mb-2">Total : <?php echo $pedido->__get('total') ?></span><br>
                    <span>Forma de pagamento : <?php echo $pedido->__get('forma_pagamento') ?></span>
            </ul>
        </main>
            
        <footer class="my-5 mx-auto text-center">
            <a href="index.php?finalizado=1">Voltar pra página principal</a><br><br>
            <span class="small">Obrigado pela preferência!</span><br>
        </footer>
    </div>
</body>
</html>


