<!--Muestra Pedidos realizados-->

<?php if(isset($gestion)): ?>
<h1>Gestionar Pedidos</h1>
<?php else: ?>
    <h1>Mis Pedidos</h1>
    
<?php endif; ?>
<table class="table table-hover">
<tr class="table-active">
    <th>No. Pedido</th>
    <th>Total</th>
    <th>Fecha</th>
    <th>Estado</th>
   
</tr>
<?php   
    while($ped= $pedidos->fetch_object()):
    ?>
    <tr>
        <td>
           <a href="<?=base_url?>pedido/detalle&id=<?=$ped->id?>"><?=$ped->id?></a>
        </td>
        <td>
            Q.<?=$ped->coste?>
        </td>
        <td>
            <?=$ped->fecha?>
        </td>
        <td>
        <?=Utils::mostrarEstado($ped->estado)?>
        </td>
    
    </tr>

<?php endwhile; ?>
</table>