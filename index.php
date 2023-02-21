<?php

require 'lista_produtos.php';
require 'Carrinho.php';

session_start();

if(!isset($_SESSION['produtos'])){
    $_SESSION['produtos'] = [];
}

if(isset($_GET['id'])){
    (new Carrinho)->adicionarProdutos($_GET['id'],$_POST['qtd']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    <ul>
        <?php foreach($lista_produtos as $produto){?>
            <li>
                <?php echo $produto['nome']?> - 
                <?php echo $produto['preco']?> - 
                <form action="?id=<?php echo $produto['id']?>" method="POST">
                    <input name="qtd" type="number" min="1" max="10" value="1">
                    <button type="submit">Adicionar</button>
                </form>
                
            </li>
            <br>
            <?php } ?>
        </ul>

    <a href="carrinho.php">Ir para o carrinho</a>
</body>
</html>