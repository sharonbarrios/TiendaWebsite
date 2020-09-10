<?php


//Categorias
class Categoria{

    private $id;
    private $nombre;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }


    //SETTERS & GETTERS
/**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
/**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 


    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($this->nombre = $nombre);

        return $this;
    }

    //Obtener todas las categorias
    public function getAll(){
        $categorias= $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
        return $categorias;
    }

    //Obtener categoria por Id
    public function getOne(){
        $categoria= $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()};");
        return $categoria->fetch_object();
    }

    //Guardar categoria en BD
    public function save(){

        $sql= "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
        $save= $this->db->query($sql);
      
        $result= false;
        if($save){
            $result=true;

        }

        return $result;
    }

}

?>