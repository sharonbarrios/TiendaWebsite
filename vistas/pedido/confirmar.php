<!--Confirmación de pedido-->

<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido']== 'completo'): ?>
    <?php Utils::resetCarrito(); ?>
<h1>Tu pedido se ha confirmado</h1>
<p> Tu pedido ha sido guardado con éxito, una vez que realice la transferencia bancaria
    a la cuenta No. 5697-86313-4465 con el total del pedido será procesado y enviado.
</p>

<br>


<!--Datos de Pedido-->
<?php if(isset($pedido)): ?>
<h2>Datos del Pedido: </h2>

    Número de pedido: <?=$pedido->id?><br>
    Total a pagar: Q.<?=$pedido->coste?><br>
    Productos: 
    <br><br>
    <table class="table">
    <tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
</tr>
    <?php while($producto= $productos->fetch_object()): ?>
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
            <?=$producto->unidades?>
        </td>


    </tr>
    <?php endwhile; ?>

    </table>
<br>
<?php endif; ?>


<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'completo'): ?>
    <h1>Tu pedido no pudo ser procesado</h1>


<?php endif; ?>