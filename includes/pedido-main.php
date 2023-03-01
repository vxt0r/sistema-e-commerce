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