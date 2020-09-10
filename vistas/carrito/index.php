<!--Carrito de compra-->

<h1>Carrito de la Compra</h1>
<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >=1 ): ?>
<table class="table">
<tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
    <th>Eliminar</th>
</tr>
<?php   foreach($carrito as $indice=> $elemento): 
            $producto= $elemento['producto'];
    ?>
    <tr>
        <td>
            <?php if($producto->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img_carrito"  alt="">
            <?php else: ?>
                <img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito" alt="">
                
            <?php endif; ?>
        </td>
        <td>
            <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
        </td>
        <td>
            <?=$producto->precio?>
        </td>
        <td>
            <?=$elemento['unidades']?>
            <div>
            <a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="btn btn-info">+</a>
            <a href="<?=base_url?>carrito/down&index=<?=$indice?>" class="btn btn-info">-</a>
            </div>
        </td>
        <td>
        <a href="<?=base_url?>carrito/remove&index=<?=$indice?>" class="btn btn-outline-danger">Quitar Producto</a>
        </td>

    </tr>

<?php endforeach; ?>
</table>
<br>

<!--Eliminar productos de carrito-->
<div class="delete-carrito">
<a href="<?=base_url?>carrito/delete_all" class="btn btn-danger">Vaciar Carrito</a>
</div>

<!--Total de carrito-->
<div class="total-carrito">
    <?php   $stats = Utils::statsCarrito(); ?>
    <h3>Precio Total: Q.<?=$stats['total']?></h3>
    <a href="<?=base_url?>pedido/hacer" class="btn btn-info button-pedido">Realizar pedido</a>

</div>

<?php else: ?>
<p class="avisos">El carrito esta vacío, añade algún producto</p>
<?php endif; ?>