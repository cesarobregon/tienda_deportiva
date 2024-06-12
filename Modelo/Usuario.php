<?php 
class Usuario{
    private $id;
    private $usuario;
    private $nombre;
    private $apellido;
    private $clave;

    public function __construct(){
        $this->setId(0);
        $this->setUsuario("");
        $this->setClave("");
    }

    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getUsuario()
    {
        return $this->usuario;
    }

    
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getClave()
    {
        return $this->clave;
    }

    
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

}
   
?>