<?php

class Utils{
    //Eliminar sesiones
    public static function deleteSession($name){
        if(isset( $_SESSION[$name])){
            $_SESSION[$name]=null;
            unset($_SESSION[$name]);

        }

        return $name;
    }

    //Crear variable de sesión según Rol

    //Administrador
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    //Comprador
    public static function isIdentity(){
        if(!isset($_SESSION['identity'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    //Mostrar categorias existentes
    public static function showCategorias(){

        require_once 'modelo/categoria.php';

        $categoria= new Categoria();
        $categorias= $categoria->getAll();
        return $categorias;
    }

    //Variable de sesión de carrito de compras
    public static function statsCarrito(){
        
        $stats = array(
            'count'=> 0,
            'total'=> 0
        ); 

        if(isset($_SESSION['carrito'])){
            $stats['count']= count($_SESSION['carrito']);

            foreach($_SESSION['carrito'] as $producto){
                $stats['total'] += $producto['precio']*$producto['unidades'];
            }
        }

        return $stats;
    }

    //Reset carrito
    public static function resetCarrito(){
        unset($_SESSION['carrito']);
    }

    //Mostrar estados de pedido
    public static function mostrarEstado($estado){
        $value= 'Pendiente';

        if($estado== 'Confirmado'){
            $value= 'Pendiente';
        }elseif($estado== 'Preparando'){
            $value='En preparación';
        }elseif($estado== 'Empacado'){
            $value= 'Preparado para Enviar';
        }elseif($estado== 'Enviado'){
            $value= 'Enviado';
        }

        return $value;
    }


    //Errores en formulario
    function mostrarError($errores, $campo){

        $alerta= '';

        if(isset($errores[$campo]) && !empty($campo)){
            
            $alerta= "<div class='alert alert-danger'>".$errores[$campo]."</div>";
        }

        return $alerta;
    }

   
}





?>