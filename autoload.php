<?php


//Carga de todos los controladores
function controladores_autoload($clasename){

    include 'controladores/'.$clasename.'.php';
}


spl_autoload_register('controladores_autoload');


?>