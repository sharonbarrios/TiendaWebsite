<!--Edición y Eliminación de Productos-->

<h1>Gestión de Productos</h1>

<a href="<?=base_url?>producto/crear" class="btn btn-info">
Crear Producto
</a>
<br><br>
<?php if(isset($_SESSION['producto']) && $_SESSION['producto']=="completo"): ?>
<strong class="alert_green">Registro Completado Correctamente!</strong>

<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']=="fallo"):?>
<strong class="alert_red">Registro Fallido, ingresa bien los datos</strong>
<?php endif;?>
<?php Utils::deleteSession('producto')?>


<?php if(isset($_SESSION['delete']) && $_SESSION['delete']=="completo"): ?>
<strong class="alert_green">Registro Eliminado Correctamente!</strong>

<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete']=="fallo"):?>
<strong class="alert_red">Hubo un error al Eliminar</strong>
<?php endif;?>
<?php Utils::deleteSession('delete')?>

<table class="table table-hover">
<tr class="table-active">
    <th>ID</th>
    <th>NOMBRE</th>
    <th>PRECIO</th>
    <th>STOCK</th>
    <th>ACCIONES</th>

</tr>

<?php while($pro = $productos->fetch_object()): ?>

    <tr>
    <td><?=$pro->id;?></td>
    <td><?=$pro->nombre;?></td>
    <td><?=$pro->precio;?></td>
    <td><?=$pro->stock;?></td>
    <td>
        <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="btn btn-success">Editar</a>
        <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="btn btn-danger">Eliminar</a>
    </td>

</tr>

<?php endwhile; ?>
</table>