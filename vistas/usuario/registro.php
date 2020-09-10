<!--Formulario de Registro de Usuarios-->

<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register']=="completo"): ?>
<strong class="alert alert-success">Registro Completado Correctamente!</strong>

<?php elseif(isset($_SESSION['register']) && $_SESSION['register']=="fallo"):?>
<strong class="alert alert-danger">Registro Fallido, ingresa bien los datos</strong>
<?php endif;?>
<?php Utils::deleteSession('register')?>


<form action="<?=base_url?>usuario/save" method="post">
    <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="" class="form-control">
    <?=isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'nombre'): ''?>
    </div>
    <div class="form-group">
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" id="" class="form-control">
    <?=isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'apellidos'): ''?>
    </div>
    <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" id="" class="form-control">
    <?=isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'email'): ''?>
    </div>
    <div class="form-group">
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="" class="form-control">
    <?=isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'password'): ''?>
    <p>
    </div>
    <input type="submit" value="Registrarse" class="btn btn-primary">
    </p>
</form>

<?php Utils::deleteSession('errores'); ?>