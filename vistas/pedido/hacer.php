<?php   if(isset($_SESSION['identity'])): ?>

    <!--Datos para envío-->

<h1>Hacer Pedido</h1>
<p>
    <a href="<?=base_url?>carrito/index">Ver los Producto y el precio del pedido</a>
</p>
<br>
<h3>Dirección para el envío: </h3>
<form action="<?=base_url.'pedido/add'?>" method="POST">
    <div class="form-group">
    <label for="provincia">Departamento</label>
    <input type="text" name="provincia" id=""  class="form-control" required>
    </div>
    <div class="form-group">
    <label for="localidad">Municipio</label>
    <input type="text" name="localidad" id=""  class="form-control" required>
    </div>
    <div class="form-group">
    <label for="direccion">Dirección</label>
    <input type="text" name="direccion" id=""  class="form-control" required>
    </div>
    <input type="submit" value="Confirmar Pedido"  class="btn btn-info">
</form>

<?php else: ?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logueado en la web para poder realizar tu pedido.</p>

<?php endif; ?>