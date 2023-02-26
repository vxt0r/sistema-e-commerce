<?php

require 'servicos/Carrinho.php';

session_start();

$carrinho = New Carrinho;
$produtos = [];

if(!empty($_SESSION['produtos'])){
    $produtos = $carrinho->preencherCarrinho($lista_produtos);
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    select{
        min-width: 120px;
    }
</style>

<body class="row bg-secondary text-white">
    <?php if(empty($produtos)){ ?>
    <header class="col-8 offset-1 gy-3">
        <span class="display-5">Seu carrinho está vazio</span>
    </header>
    <?php } else{ ?>

        <ul class="row col-10 mx-auto gy-3">
        <?php foreach($produtos as $produto){ ?>
            <li class="row col-12 gy-3 h5 list-unstyled"> 
                <span class="col-sm-8 col-md-3">Produto: <?php echo $produto->__get('nome')?></span>
                <span class="col-sm-8 col-md-3">Preço unitário: <?php echo $produto->__get('preco')?></span>
                <span class="col-sm-8 col-md-3">Quantidade: <?php echo $produto->__get('qtd')?></span>

                <a class="col-sm-8 col-md-3 text-white" href="?remover=1&id=<?php echo $produto->__get('id')?>">
                Remover
                </a>
            </li>
            <?php } } ?>
        </ul>

        <div class="col-10 mx-auto gy-2">
            <a href="index.php" class="ms-4 text-white">Selecionar mais produtos</a><br>
            <a href="?finalizar=1" class="ms-4 text-white">Finalizar Compra</a><br>
            <a href="?limpar=1" class="ms-4 text-white">Limpar Carrinho</a>
        </div>
    
    <?php 
    if(isset($_GET['remover'])){
        $carrinho->removerProduto($_GET['id']);
        
    } 
    elseif(isset($_GET['limpar'])){
        $carrinho->limparCarrinho();

    }
    
    elseif(isset($_GET['finalizar'])){
        if($_GET['finalizar'] == 1){
            foreach($produtos as $produto){
                $_SESSION['pedido'][] = serialize($produto);
            }
            header('Location:?finalizar=2');
        }
    ?>

    <br><br>
    <section class="row col-10 mx-auto gy-5">

        <span class="col-12 h5">Total: <?php echo $carrinho->valorCompra($produtos)?></span>

        <form class="row col-12" action="pedido.php" method='POST'>

            <label class="col-12 form-label h5 mb-3">Escolha a forma de pagamento</label>
            <select class="col-12 form-select w-25 ms-2 mb-4" name="pagamento">
                <option value="1">Cartão de Crédito</option>
                <option value="2">Boleto</option>
                <option value="3">Pix</option>
            </select>
            <input type="hidden" name="total" value="<?php echo $carrinho->valorCompra($produtos)?>">
            <div class="col-12 mb-3">
                <button class="btn btn-dark text-white" type="submit">Avançar</button>
            </div>

        </form>
    </section>
    <?php } ?>

</body>
</html>