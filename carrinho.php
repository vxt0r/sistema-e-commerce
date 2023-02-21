<?php
require 'lista_produtos.php';
require 'Produto.php';
require 'Carrinho.php';

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
<body class="bg-secondary text-white">
    <?php if(empty($produtos)){ ?>
    <header class="m-3">
        <span class="display-5">Seu carrinho está vazio</span>
    </header>
    <?php } else{ ?>

        <ul class="m-3">
        <?php foreach($produtos as $produto){ ?>
            <li class="h5"> 
                <span class="me-1">Produto: <?php echo $produto->__get('nome')?></span> -
                <span class="me-1">Preço unitário: <?php echo $produto->__get('preco')?></span> -
                <span class="me-3">Quantidade: <?php echo $produto->__get('qtd')?></span>

                <a href="?remover=1&id=<?php echo $produto->__get('id')?>" class="text-white">
                    Remover
                </a>
            </li>
            <?php } } ?>
        </ul>
        <div class="ms-3 mt-5">
            <a href="index.php" class="text-white">Selecionar mais produtos</a><br>
            <a href="?finalizar=1" class="text-white">Finalizar Compra</a><br>
            <a href="?limpar=1" class="text-white">Limpar Carrinho</a>
        </div>
    
    <?php 
    if(isset($_GET['remover'])){
        $carrinho->removerProduto($_GET['id']);
        
    } 
    elseif(isset($_GET['limpar'])){
        $carrinho->limparCarrinho();

    }
    elseif(isset($_GET['finalizar'])){

        foreach($produtos as $produto){
            $_SESSION['pedido'][] = serialize($produto);
        }
    ?>

    <br><br>
    <section class="ms-3 py-2">
        <span class="h5">Total: <?php echo $carrinho->valorCompra($produtos)?></span>
        
        <form action="pedido.php" method='POST' class="mt-3">
            
            <label class="form-label h5 mb-3">Escolha a forma de pagamento</label>
            <select name="pagamento" class="form-select w-25 mb-4">
                <option value="1">Cartão de Crédito</option>
                <option value="2">Boleto</option>
                <option value="3">Pix</option>
            </select>

            <input type="hidden" name="total" value="<?php echo $carrinho->valorCompra($produtos)?>">
            
            <button type="submit" class="btn btn-dark text-white">Avançar</button>
        </form>
    </section>
    <?php } ?>

</body>
</html>