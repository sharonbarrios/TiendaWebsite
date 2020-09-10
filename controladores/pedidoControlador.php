<?php

require_once 'modelo/pedido.php';

//Pedidos
class pedidoControlador{

    public function hacer(){
        
        require_once 'vistas/pedido/hacer.php';
    }

    //Obtener datos de entraga y guardar en db
    public function add(){
        //Datos obtenidos del formulario
        if(isset($_SESSION['identity'])){
            $usuario_id= $_SESSION['identity']->id;
            $provincia= isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad= isset($_POST['provincia']) ? $_POST['localidad'] : false;
            $direccion= isset($_POST['provincia']) ? $_POST['direccion'] : false;

            $stats = Utils::statsCarrito();
            $coste= $stats['total'];

            if($provincia && $localidad && $direccion){
            //Guardar DB
            $pedido = new Pedido();
            $pedido->setUsuario_id($usuario_id);
            $pedido->setProvincia($provincia);
            $pedido->setLocalidad($localidad);
            $pedido->setDireccion($direccion);
            $pedido->setCoste($coste);

            $save= $pedido->save();

            //Guardar linea pedido
            $save_linea= $pedido->save_line();

            if($save && $save_linea){
                $_SESSION['pedido']= "completo";
            }else{
                $_SESSION['pedido']= "fallo"; 
            }   
        }else{
                $_SESSION['pedido']= "fallo"; 
        }
                header("Location:".base_url.'pedido/confirmado');
        }else{
            //Redirigir
            header("Location:".base_url);
        }

    }

    //Confirmar pedido
    public function confirmado(){

        if(isset($_SESSION['identity'])){
        $identity= $_SESSION['identity'];
        $pedido= new Pedido();
        $pedido->setUsuario_id($identity->id);

        $pedido= $pedido->getOneByUser();

        $pedido_productos= new Pedido();
        $productos= $pedido_productos->getProductsByOrder($pedido->id);
        }
        require_once 'vistas/pedido/confirmar.php';


    }

    //Obtener pedidos realizados
    public function mis_pedidos(){

        Utils::isIdentity();

        $usuario_id= $_SESSION['identity']->id;

        //Obtener pedidos del usuario
        $pedido= new Pedido();
        $pedido->setUsuario_id($usuario_id);
        $pedidos= $pedido->getAllByUser();

        require_once 'vistas/pedido/mis_pedidos.php';
    }

    //Detalle de los pedidos
    public function detalle(){
        Utils::isIdentity();

        if(isset($_GET['id'])){
            $id= $_GET['id'];

            //Obtener el pedido
            $pedido= new Pedido();
            $pedido->setId($id);
            $pedido= $pedido->getOne();

            //Obtener los Productos
            $pedidos_productos= new Pedido();
            $productos = $pedidos_productos->getProductsByOrder($id);

            require_once 'vistas/pedido/detalle.php';

        }else{
            header('Location:'.base_url.'pedido/mis_pedidos');
        }

    }

    //Obtener pedidos
    public function gestion(){
        Utils::isAdmin();
        $gestion= true;

        $pedido= new Pedido();
        $pedidos= $pedido->getAll();
        
        require_once 'vistas/pedido/mis_pedidos.php';

    }

    //Estado de los pedidos
    public function estado(){

        Utils::isAdmin();

        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
            
            //Recibir Pedidos
            $id= $_POST['pedido_id'];
            $estado= $_POST['estado'];
            
            // Actualizar estado del pedido
            $pedido= new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->updateOne();

            header('Location: '.base_url.'pedido/detalle&id='.$id);

        }else{
             header('Location: '.base_url);
        }
    }

}


?>