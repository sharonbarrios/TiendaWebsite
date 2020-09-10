<!--Creación de categoría-->

<h1>Crear Nueva Categoría</h1>
<form action="<?=base_url?>categoria/save" method="post">
<div class="form-group">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="" class="form-control" required>
</div>
<div>
    <input type="submit" value="Guardar" class="buttons btn btn-info">
</div>
</form>
<?php


?>