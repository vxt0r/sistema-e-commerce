<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
</head>
<body class="bg-light text-center">
    <div class="container">
        <header class="text-secondary">
            <h3>Escolha seus produtos e realize sua compra!</h3>
            <a href="carrinho.php">Ir para o carrinho</a>
        </header>

        <main class="col-10 col-sm-8 mx-auto bg-secondary rounded text-white">
            <ul class="container py-2">
            <?php foreach($lista_produtos as $produto){?>
                <li class="my-3 list-unstyled">

                    <span><?php echo $produto->nome?></span> - 
                    <span>R$ <?php echo $produto->preco?></span>

                    <form class="my-2" action="carrinho.php?adicionar=1" method="POST">
                        <input type="hidden" name="nome" value="<?php echo $produto->nome ?>">
                        <input type="hidden" name="preco" value="<?php echo $produto->preco ?>">
                        <input type="hidden" name="id" value="<?php echo $produto->id ?>">
                        <input class="form-control w-50 mx-auto" name="qtd" type="number" value ="1" min="1" max="20">
                        <button class="btn btn-dark my-2 text-white rounded"type="submit">Adicionar</button>
                    </form>
                </li>
            <?php } ?>
            </ul>
        </main>
        
        <footer class="text-secondary">
            <h6>Frete grátis em compras acima de R$100</h6>
        </footer>
    </div>   
</body>
</html>