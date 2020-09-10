
    <!--BARRA LATERAL-->
    <div class="content">
    <aside id="lateral">

    <!--Carrito-->
    <?php if(!isset($_SESSION['admin'])): ?>
    <div id="carrito" class="block_aside">
         <h3>Mi carrito</h3>
         <ul class="d-md-none">
            <?php $stats= Utils::statsCarrito();?>
             <li> <img src="<?=base_url?>assets/img/ropa.png" alt="">(<?=$stats['count']?>)</li>
             <li> <img src="<?=base_url?>assets/img/dinero.png" alt=""> (Q.<?=$stats['total']?>)</li>
             <li> <a href="<?=base_url?>carrito/index"><img src="<?=base_url?>assets/img/carro.png" alt=""></a></li>
         </ul>

         <ul class="d-none d-md-block">
            <?php $stats= Utils::statsCarrito();?>
             <li> <img src="<?=base_url?>assets/img/ropa.png" alt=""> Productos (<?=$stats['count']?>)</li>
             <li> <img src="<?=base_url?>assets/img/dinero.png" alt=""> Total (Q.<?=$stats['total']?>)</li>
             <li> <img src="<?=base_url?>assets/img/carro.png" alt=""> <a href="<?=base_url?>carrito/index">Ver el Carrito</li></a>
         </ul>
    </div>
 <?php endif; ?> 
        <div id="login" class="block_aside">

        <!--Inicio de sesión-->
        <?php if(!isset($_SESSION['identity'])):?>
              
            <h3>Iniciar Sesión</h3>
        <form action="<?=base_url?>usuario/login" method="post">
        <div class="form-group">
        <?=isset($_SESSION['error_login']) ? '<strong class="alert alert-danger">'.$_SESSION['error_login'].'</strong>': ''?>
        </div>
        <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group"> 
        <label for="password">Contraseña: </label>
        <input type="password" name="password" class="form-control" required>
        </div>
        <input type="submit" value="Ingresar" class="btn btn-primary">
        </form>
        <?php Utils::deleteSession('error_login'); ?>
        <?php else: ?> 
       <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
        <?php endif; ?>   

        <!--Menú de gestión-->
        <ul class="list-group">

           <?php if(isset($_SESSION['admin'])): ?>
           <li class="list-group-item"><a href="<?=base_url?>categoria/index">Gestionar Categorías</a></li>
           <li class="list-group-item"><a href="<?=base_url?>producto/gestion">Gestionar Productos</a></li>
           <li class="list-group-item"><a href="<?=base_url?>pedido/gestion">Gestionar Pedidos</a></li>
           <?php endif; ?>

           <?php if(isset($_SESSION['identity'])): ?>
            <?php if(!isset($_SESSION['admin'])): ?>
           <li class="list-group-item"><a href="<?=base_url?>pedido/mis_pedidos">Mis Pedidos</a></li>
           <?php endif; ?>
           <li class="list-group-item"><a href="<?=base_url?>usuario/logout">Cerrar Sesión</a></li>
           <?php else: ?>
           <a href="<?=base_url?>usuario/registro">Registrate aquí</a>
           <?php endif; ?>
        </ul>
    </aside>
    
 <!--CONTENIDO CENTRAL-->
 <div id="central">
 <button id="hideAside" class="d-md-none button-hide"><img src="<?=base_url?>assets/img/proximo.png" alt=""></button>
   
    
 