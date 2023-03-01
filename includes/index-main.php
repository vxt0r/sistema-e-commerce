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


