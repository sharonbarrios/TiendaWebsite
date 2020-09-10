<!--Mostrar Productos Destacados-->

<h1>Productos Destacados</h1>

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
    
  