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
</head>
<body>
    <ul>
        <?php if(empty($produtos)){ ?>
        <span>Seu carrinho está vazio</span>
        <?php } else{ ?>
        <?php foreach($produtos as $produto){ ?>
        <li> 
            <span>Produto: <?php echo $produto->__get('nome')?></span> -
            <span>Preço unitário: <?php echo $produto->__get('preco')?></span> -
            <span>Quantidade: <?php echo $produto->__get('qtd')?></span>

            <a href="?remover=1&id=<?php echo $produto->__get('id')?>">
                Remover
            </a>
        </li>
        <?php } } ?>

    </ul>
    <a href="index.php">Selecionar mais produtos</a><br>
    <a href="?finalizar=1">Finalizar Compra</a><br>
    <a href="?limpar=1">Limpar Carrinho</a>
    
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
        echo '<pre>';
        print_r($_SESSION);
        echo '<pre>';
    ?>

    <br><br>
    <span>Total: <?php echo $carrinho->valorCompra($produtos)?></span>
    
    <form action="pedido.php" method='POST'>
        
        <label for="">Escolha a forma de pagamento</label>
        <select name="pagamento" id="">
            <option value="1">Cartão de Crédito</option>
            <option value="2">Boleto</option>
            <option value="3">Pix</option>
        </select>

        <input type="hidden" name="total" value="<?php echo $carrinho->valorCompra($produtos)?>">
        
        <button type="submit">Avançar</button>
    </form>

    <?php } ?>

</body>
</html>