<?php

require_once 'modelo/producto.php';

//Productos
class productoControlador{

    public function index(){

        $producto= new Producto();
        $productos= $producto->getRandom(6);

        //renderizar vista

        require_once 'vistas/producto/destacados.php';
    }

    //Obtener producto por Id
    public function ver(){
        if(isset($_GET['id'])){
           
            $id= $_GET['id'];
           

        $producto= new Producto();
        $producto->setId($id);
        $product= $producto->getOne();

        
        }
        require_once 'vistas/producto/ver.php';
    }

    //Obtener todos los productos
    public function gestion(){

        Utils::isAdmin();

        $producto= new Producto();
        $productos= $producto->getAll();

        require_once 'vistas/producto/gestion.php';
    }

    //Crear un nuevo producto
    public function crear(){
        require_once 'vistas/producto/crear.php';

        Utils::isAdmin();


    }

    //Guardar producto en la bd
    public function save(){
        Utils::isAdmin();

        //Datos del formulario
        if(isset($_POST)){
            $nombre= isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if($nombre && $descripcion && $precio && $stock && $categoria){

                $producto= new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);

                //Guardar imagen
                if(isset($_FILES['imagen'])){
                $archivo= $_FILES['imagen'];
                $filename= $archivo['name'];
                $mimetype= $archivo['type'];

                //Verificar formato de imagen
                if($mimetype=="image/jpg" || $mimetype=="image/jpeg" || $mimetype=="image/png" 
                || $mimetype=="image/gif"){
                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images', 0777, true);
                    }

                    move_uploaded_file($archivo['tmp_name'], 'uploads/images/'.$filename);
                    $producto->setImagen($filename);
                }
            }

                if(isset($_GET['id'])){
                    $id= $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->edit();

                }else{
                    $save = $producto->save();

                }

                if($save){
                    $_SESSION['producto']= "completo";
                }else{
                    $_SESSION['producto']= "fallo";
                }
            }else{
                $_SESSION['producto']= "fallo";
            }
        }else{
                $_SESSION['producto']="fallo";
                
            }
            header('Location:'.base_url.'producto/gestion');
   }

   //Edición de producto
   public function editar(){

        Utils::isAdmin();
        if(isset($_GET['id'])){
           
            $id= $_GET['id'];
            $edit= true;

        $producto= new Producto();
        $producto->setId($id);
        $pro= $producto->getOne();

        require_once 'vistas/producto/crear.php';
        }
        else{
            header("Location:".base_url."producto/gestion");

        }

   }

   //Eliminación de Producto
   public function eliminar(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id= $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);


            $eliminar= $producto->delete();

            if($eliminar){
                $_SESSION['delete']= "completo";
               

            }else{
                $_SESSION['delete']= "fallo";
            }
        }else{
            $_SESSION['delete']= "fallo";
        }

        header("Location:".base_url."producto/gestion");

   }
}


?>