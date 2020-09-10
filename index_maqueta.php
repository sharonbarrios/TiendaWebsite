<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Tienda Online</title>
</head>
<body>
    <div id="container">
    <!--CABECERA-->
    <header id="header">
    <div id="logo">
    <img src="assets/img/camiseta.png" alt="Camiseta Logo">
    <a href="index.php">
    <h1>Tienda Online</h1>
    </a>
    </div>
    
    </header>

    <!--MENU-->
    <nav id="menu">
    <ul>
    <li>
    <a href="#">Inicio</a>
    </li>
    <li>
    <a href="#">Categoria 1</a>
    </li>
    <li>
    <a href="#">Categoria 2</a>
    </li>
    <li>
    <a href="#">Categoria 3</a>
    </li>
    <li>
    <a href="#">Categoria 4</a>
    </li>
    <li>
    <a href="#">Categoria 5</a>
    </li>
    </ul>
    </nav>
    <div id="content">
 <!--BARRA LATERAL-->
 <aside id="lateral">
        <div id="login" class="block-aside">
            <h3>Entrar a la Web</h3>
        <form action="" method="post">
        <p>
        <label for="email">Email:</label>
        <input type="text" name="email" id="">
        </p>
        <p>
        <label for="password">Contraseña: </label>
        <input type="password" name="password" id="">
        </p>
        <p>
        <input type="submit" value="Enviar">
        </p>
        </form>
        <ul>
           <li><a href="#">Mis Pedidos</a></li>
           <li><a href="#">Gestionar Pedidos</a></li>
           <li><a href="#">Gestionar Categorías</a></li>
        </ul>
        </div>
    
    </aside>
 <!--CONTENIDO CENTRAL-->
 <div id="central">
 <h1>Productos Destacados</h1>
    <div class="product">
    <img src="assets/img/camiseta.png" alt="Camiseta">
    <h2>Camiseta</h2>
    <p>30.00</p>
    <a href="#" class="buttom">Comprar</a>
    </div>
    <div class="product">
    <img src="assets/img/camiseta.png" alt="Camiseta">
    <h2>Camiseta</h2>
    <p>30.00</p>
    <a href="#" class="buttom">Comprar</a>
    </div>
    <div class="product">
    <img src="assets/img/camiseta.png" alt="Camiseta">
    <h2>Camiseta</h2>
    <p>30.00</p>
    <a href="#" class="buttom">Comprar</a>
    </div>
    </div>
</div>
   
    <!--FOOTER-->
    <footer id="footer">
    <p>Desarrollado por Sharon Barrios &copy <?=date('Y')?></p>
</footer>
</div>
</body>
</html>