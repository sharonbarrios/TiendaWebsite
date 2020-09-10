<?php

//Inicio de sesión 
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parametros.php';
require_once 'helpers/utils.php';
require_once 'vistas/layouts/header.php';
require_once 'vistas/layouts/sidebar.php';

//Conexion a base de datos
$db= Database::connect();

//Errores
function show_error(){
    $error= new errorControlador();
    $error->index();
}


//Controladores
if(isset($_GET['controlador'])){
$nombre_controlador= $_GET['controlador'].'Controlador';
}
elseif(!isset($_GET['controlador']) && !isset($_GET['action'])){
    $nombre_controlador= controlador_default;
}else{
    show_error();
    exit();
}


//Verificación de existencia de controlador
if(isset($nombre_controlador) && class_exists($nombre_controlador)){
    
    
    $controlador= new $nombre_controlador();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){

        $action= $_GET['action'];
        $controlador->$action();
    }elseif(!isset($_GET['controlador']) && !isset($_GET['action'])){
            $default= action_default;
            $controlador->$default();
    }
    else{
        show_error();
    }
}else{
        show_error();
}


//Footer
require_once 'vistas/layouts/footer.php';


?>