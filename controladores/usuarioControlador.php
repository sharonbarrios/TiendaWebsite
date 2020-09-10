<?php

require_once 'modelo/usuario.php';

//Usuarios
class usuarioControlador{

    public function index(){
        echo "Controlador de Usuarios";
    }

    //Registro de usuario
    public function registro(){
        require_once 'vistas/usuario/registro.php';
    }

    public function save(){
        //Guardar usuario 

        if(isset($_POST)){

        // Array de errores
         $errores= array();   

         //Comprobación de recepción de datos del formulario
         $nombre= isset($_POST['nombre']) ? $_POST['nombre'] : false ;
         $apellidos= isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
         $email= isset($_POST['email']) ? $_POST['email'] : false;
         $password= isset($_POST['password']) ? $_POST['password'] : false;

         // Validación de datos antes de guardar en la base de datos
            if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                $nombre_valido= true;
            }else{
                $nombre_valido= false;
                $errores['nombre']= "El nombre no es válido"; 
            }

            if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
                $apellidos_valido= true;
            }else{
                $apellidos_valido= false;
                $errores['apellidos']= "Los apellidos no son válidos"; 
            }

            //Validar email
            if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_valido= true;
            }else{
                $email_valido= false;
                $errores['email']= "El email no es válido";
            }

            //Validad contraseña

            if(!empty($password)){
                $password_valido= true;
            }else{
                $password_valido= false;    
                $errores['password']= "La contraseña está vacía";
            }

            $guardar_usuario= false;

            if(count($errores) == 0){

                $guardar_usuario= true;
                if($nombre_valido && $apellidos_valido && $email_valido && $password_valido){
                   
                $usuario= new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
    
                $save= $usuario->save();
                
                     if($save){
                        $_SESSION['register']= "completo";
                     }else{
                        $_SESSION['register']= "fallo";
                          }
                          
            }else{
                $_SESSION['register']= "fallo";
        
            }
            }else{
                $_SESSION['errores']= $errores;
                
                }
            }
               else{
                    $_SESSION['register']="fallo";
            
                    }
        
        header('Location:'.base_url.'usuario/registro');
    }

    //Inicio de sesión
    public function login(){
        if(isset($_POST)){
            //Identificar usuario
            //Consulta a db
            
            $usuario= new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity= $usuario->login();
            
            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;

                if($identity->rol =='admin'){
                    $_SESSION['admin']= true;
                }else{
                    $_SESSION['error_login']= " ";
                }
            }else{
                $_SESSION['error_login']= "Datos Incorrectos";
            }
        }
        header("Location: ".base_url);
    }


    //Cerrar sesión
    public function logout(){
        //Cerrar sesión
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
            $_SESSION['error_login']= null;
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        header('Location:'.base_url);
    }
}


?>