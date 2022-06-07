<?php
class Usuario{
    private $Id;
    private $Nombre;
    private $Apellido;
    private $Correo;
    private $Telefono;
    private $Rol;
    private $Imagen;
 public function __construct($Id,$Nombre,$Apellido,$Correo,$Telefono,$Rol,$Imagen)
 {
    $this->Id = $Id;
    $this->Nombre = $Nombre;
    $this->Aoellido = $Apellido;
    $this->Correo = $Correo;
    $this->Telefono = $Telefono;
    $this->Rol = $Rol;
    $this->Imagen = $Imagen;

  

 }

}
?>