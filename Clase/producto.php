<?php
namespace Clase;
require "BD_metodos.php";
require "Config/conexiones_BD.php";
class producto{
    private $Id;
    private $nomre;
    private $tipo;
    private $foto;
    private $precio;
    private $cantidaddisponible;
    private $descripcion;
   
 public function __construct($Id,$nombre,$tipo,$foto,$precio,$cantidaddisponible,$descripcion)
 {
    $this->Id = $Id;
    $this->nombre = $nombre;
    $this->tipo = $tipo;
    $this->foto = $foto;
    $this->precio = $precio;
    $this->cantidaddisponible = $cantidaddisponible;
    $this->descripcion = $descripcion;
 }
 public function __get($property){
   if(property_exists($this, $property)) {
       return $this->$property;
   }
}
public function obtener_producto($id){
   
}

}

?>