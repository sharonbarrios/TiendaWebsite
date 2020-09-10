<?php
//Productos
class Producto{

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    public function __construct(){
        $this->db = Database::connect();
    }

        //Setter y Getters de la clase Producto
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
     * Get the value of categoria_id
     */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */ 
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;

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
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio =$this->db->real_escape_string($precio);

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);

        return $this;
    }

    /**
     * Get the value of oferta
     */ 
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set the value of oferta
     *
     * @return  self
     */ 
    public function setOferta($oferta)
    {
        $this->oferta = $oferta;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

         //Obtener todos los productos
    public function getAll(){
        $productos= $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
        return $productos;
    }

    public function getAllCategory(){
        $sql= "SELECT p.*, c.nombre AS 'catnombre' FROM productos p
        INNER JOIN categorias c ON c.id=p.categoria_id WHERE p.categoria_id={$this->getId()} ORDER BY id DESC;";
        $productos= $this->db->query($sql);
        return $productos;
    }

        //Obtener el producto según Id
    public function getOne(){
        $producto= $this->db->query("SELECT * FROM productos WHERE id={$this->getId()};");
        return $producto->fetch_object();
    }

        //Obtener productos aleatorios
    public function getRandom($limit){
        $productos= $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit ");

        return $productos;
    }

        //Guardar Producto en la base de datos
    public function save(){

        //Guardar Producto
        $sql= "INSERT INTO productos VALUES(NULL, {$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', 
        {$this->getPrecio()}, {$this->getStock()}, null, CURDATE(), '{$this->getImagen()}');";
        $save= $this->db->query($sql);


        $result= false;
        if($save){
            $result=true;

        }

        return $result;
    }

        //Modificar un producto en la base de datos
    public function edit(){

        //Modificar Producto
        $sql= "UPDATE productos SET categoria_id= '{$this->getCategoria_id()}', nombre='{$this->getNombre()}', descripcion= '{$this->getDescripcion()}', 
        precio= {$this->getPrecio()}, stock= {$this->getStock()}, oferta= null, fecha= CURDATE() ";
       
       if($this->getImagen() !=null){

           $sql.= ", imagen='{$this->getImagen()}' ";
       }

       $sql.= "WHERE id={$this->getId()}";

        $save= $this->db->query($sql);


        $result= false;
        if($save){
            $result=true;

        }

        return $result;
    }

        //Eliminar un producto de la base de datos
    public function delete(){

        //Eliminar Producto
        $sql= "DELETE FROM productos WHERE id={$this->id}";
        $delete= $this->db->query($sql);

        $result= false;
        if($delete){
            $result=true;

        }
        return $result;

    }

}

?>