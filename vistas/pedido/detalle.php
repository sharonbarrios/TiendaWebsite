<!--Detalle de Pedido-->
<h1>Detalle del Pedido</h1>

<?php if(isset($pedido)): ?>
<?php if(isset($_SESSION['admin'])): ?>
<h3>Cambiar estado de pedido: </h3>

<form action="<?=base_url?>pedido/estado" method="POST">
   
    <input type="hidden" name="pedido_id" value="<?=$pedido->id?>">
    <div class="form-group">
    <select name="estado" id="" class="form-control" >
        <option value="Confirmado" <?= Utils::mostrarEstado($pedido->estado)=='Pendiente' ? 'selected="selected"' : '';?>>Pendiente</option>
        <option value="Preparando" <?= Utils::mostrarEstado($pedido->estado)=='En preparación' ? 'selected="selected"' : '';?>>En preparación</option>
        <option value="Empacado" <?= Utils::mostrarEstado($pedido->estado)=='Preparado para Enviar' ? 'selected="selected"' : '';?>>Preparado para Enviar</option>
        <option value="Enviado" <?= Utils::mostrarEstado($pedido->estado)=='Enviado' ? 'selected="selected"' : '';?>>Enviado</option>
    </select>
    </div>
    <div>
        <input type="submit" value="Cambiar" class="buttons btn btn-info">
    </div>
</form>
<?php endif; ?>


<br>
<h3>Datos de Envío</h3>
Nombre: <?=$pedido->nombres?><br>
Departamento: <?=$pedido->provincia?><br>
Municipio: <?=$pedido->localidad?><br>
Dirección: <?=$pedido->direccion?><br>
<br> 


<h3>Datos del Pedido: </h3>
    Estado: <?=Utils::mostrarEstado($pedido->estado)?><br>
    Número de pedido: <?=$pedido->id?><br>
    Total a pagar: Q.<?=$pedido->coste?><br><br>
    <strong>PRODUCTOS: </strong>
    
    <table class="table">
    <tr class="table-active">
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