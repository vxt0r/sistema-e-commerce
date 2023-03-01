
<main class="col-12 col-sm-10 mx-auto py-2 bg-secondary text-white text-center rounded">

    <?php if(empty($_SESSION['carrinho'])){?>
        <p>Seu carrinho está vazio</p>
    <?php } else{ ?>

        <ul class="container py-2">
            <?php foreach($_SESSION['carrinho'] as $produto){ ?>
            <li class="row list-unstyled my-2 mx-auto">
                <span class="col-12 col-sm-6 col-md-4">Produto: <?php echo $produto->__get('nome')?></span> 
                <span class="col-12 col-sm-6 col-md-4">Preço Unitário: R$<?php echo $produto->__get('preco')?></span>  
                <span class="col-12 col-sm-6 col-md-4">Quantidade: <?php echo $produto->__get('qtd')?></span>
                <span class="col-12 col-sm-6 col-md-12">Sub-total: <?php echo $produto->__get('preco') * $produto->__get('qtd')?></span>
                <a href="?remover=1&id=<?php echo $produto->__get('id') ?>">Remover</a> 
            </li>
            <?php } ?>
        </ul>
        <a class="mx-auto" href="?finalizar=1">Avançar</a>
    <?php } ?>

    <?php if(isset($_GET['finalizar'])){?>
        <br><br>
        <form class="d-flex flex-column align-items-center mb-3" action="pedido.php" method="POST">
            <input name="total" type="hidden" value="<?php echo (new Produto)->calcularTotal()?>">
            <span>Total: <?php echo (new Produto)->calcularTotal()?></span>
            <select class="mt-3 mb-2" name="pagamento" id="">
                <option value="Cartão de Crédito">Cartão de Crédito</option>
                <option value="Boleto">Boleto</option>
                <option value="Pix">Pix</option>
            </select>
            <button type="submit">Confirmar</button>
        </form>
    <?php } ?>
    
   



</main>