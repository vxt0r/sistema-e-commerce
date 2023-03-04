<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/carrinho.css">
</head>
<body class="bg-light">
    <div class="container">

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
                <a class="text-dark" href="?remover=1&id=<?php echo $produto->__get('id') ?>">Remover</a> 
            </li>
            <?php } ?>
        </ul>
         <a class="mx-auto text-white" href="?finalizar=1">Avançar</a>
            <?php } ?>

        <?php if(isset($_GET['finalizar'])){?>
            <br><br>
            <form class="d-flex flex-column align-items-center mb-3" action="pedido.php" method="POST">
                <input name="total" type="hidden" value="<?php echo (new Produto)->calcularTotal()?>">
                <span>Total: <?php echo (new Produto)->calcularTotal()?></span>
                <select class="form-select w-50 mt-3 mb-2" name="pagamento" id="">
                    <option value="Cartão de Crédito">Cartão de Crédito</option>
                    <option value="Boleto">Boleto</option>
                    <option value="Pix">Pix</option>
                </select>
                <button class="btn btn-dark"type="submit">Confirmar</button>
            </form>
        <?php } ?>
    </main>

        <footer class="mb-3 mx-auto text-center">
            <a href="index.php">Selecionar mais produtos</a>
            <br><br>
            <a href="?limpar=1">Limpar Carrinho</a>
        </footer>
    </div>
</body>
</html>





    