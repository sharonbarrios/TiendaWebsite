<?php

require_once 'modelo/categoria.php';
require_once 'modelo/producto.php';


//Categorias 
class categoriaControlador{

    public function index(){
        Utils::isAdmin();
        $categoria= new Categoria();
        $categorias= $categoria->getAll();

        require_once 'vistas/categoria/index.php';
    }

    public function ver(){

        if(isset($_GET['id'])){

            $id= $_GET['id'];

            //Devolver Categoria
            $categoria= new Categoria();
            $categoria->setId($id);
            $categoria= $categoria->getOne();


            //Devolver Producto
            $producto= new Producto();
            $producto->setId($id);
            $productos= $producto->getAllCategory();

        }
        require_once 'vistas/categoria/ver.php';
    }

        //crear categoría
    public function crear(){
        Utils::isAdmin();
        require_once 'vistas/categoria/crear.php';
    }

    public function save(){
       
        Utils::isAdmin();

        //Guardar Categoria en bd
        if(isset($_POST)){

            $nombre= isset($_POST['nombre']) ? $_POST['nombre'] : false ;

            if($nombre){
                $categoria= new Categoria();
                $categoria->setNombre($nombre);
                $categoria->save();
            }
        }

        header('Location:'.base_url.'categoria/index');
       
    }

}


?>