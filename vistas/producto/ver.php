<!--Ver detalle de Producto-->

<?php if(isset($product)): ?>

<h1><?=$product->nombre?></h1>
<div id="detail-product">
    <div class="image">
<?php if($product->imagen !=null): ?>
    <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="">
<?php else: ?>
    <img src="<?=base_url?>assets/img/camisa.jpg" alt="">
<?php endif; ?>
</div>
<div class="data">
    <p class="description"><?=$product->descripcion?></p>
    <p class="price">Q. <?=$product->precio?></p>
    <a href="<?=base_url?>carrito/add&id=<?=$product->id?>">
    <button class="btn btn-info" <?=isset($_SESSION['admin']) ? "disabled" : " " ?>>Comprar</button>
    </a>
    </div>
    </div>
<?php else: ?>
    <h1 class="avisos">El producto no existe</h1>

<?php endif; ?>