<?php

require 'servicos/Produto.servico.php';


session_start();

if(!isset($_SESSION['produtos'])){
    $_SESSION['produtos'] = [];
}

if(isset($_GET['id'])){
    (new ProdutoServico)->adicionarProdutos($_GET['id'],$_POST['qtd']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="row bg-light">

    <header class="col-10 col-sm-8 gy-5 mx-auto text-secondary text-center">
        <h3>Escolha seus produtos e realize sua compra!</h3>
    </header>

    <main class="col-10 col-sm-8 col-md-6 gy-3 mx-auto bg-secondary rounded text-white">

        <ul class="row col-10">
            <?php foreach($lista_produtos as $produto){?>
            <li class="col-12 gy-4 list-unstyled">

                <div class="mb-2">
                    <span><?php echo $produto['nome']?> - </span>
                    <span> Valor: R$<?php echo $produto['preco']?></span>
                </div>
               
                <form action="?id=<?php echo $produto['id']?>" method="POST" class="d-flex">
                    <input name="qtd" type="number" min="1" max="10" value="1" class="form-control w-50">
                    <button type="submit" class="btn btn-dark text-white ms-2">Adicionar</button>
                </form> 
                   
            </li><br>
            <?php } ?>
        </ul>

    </main>

    <footer class="col-10 col-sm-8 gy-3 mx-auto text-center">
        <a href="carrinho.php">Ir para o carrinho</a>
    </footer>
</body>
</html>