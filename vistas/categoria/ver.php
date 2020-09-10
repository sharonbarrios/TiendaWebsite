<!--Productos según categoría-->

<?php if(isset($categoria)): ?>

<h1><?=$categoria->nombre?></h1>
<?php if($productos->num_rows == 0) : ?>
<p class="avisos">No hay productos para mostrar</p>
<?php else: ?>
            <?php while($product= $productos->fetch_object()): ?>

                <div class="product">
                <a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
                <?php if($product->imagen!=null):?>
                <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="Camiseta">
                <?php else:?>
                <img src="<?=base_url?>assets/img/camisa.jpg" alt="">
                <?php   endif; ?>
             <h2><?=$product->nombre ?></h2>
             </a>
             <p><?php $product->precio ?></p>
             <a href="<?=base_url?>carrito/add&id=<?=$product->id?>">
             <button class="btn btn-info" <?=isset($_SESSION['admin']) ? "disabled" : " " ?>>Comprar</button>
             </a>
             </div>

        <?php endwhile; ?>

<?php endif; ?>
<?php else: ?>
<h1 class="avisos">La Categoria no existe</h1>

<?php endif; ?>