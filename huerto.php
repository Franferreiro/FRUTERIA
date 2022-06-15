<?php
class huerto{
    private $Id;
    private $tipo;
    private $precio;
    private $metros;
    private $imagen;
    private $descripcion;
   
 public function __construct($Id,$tipo,$precio,$metros,$imagen,$descripcion)
 {
    $this->Id = $Id;
    $this->tipo = $tipo;
    $this->precio = $precio;
    $this->metros = $metros;
    $this->imagen = $imagen;
    $this->descripcion = $descripcion;
 }

}
?>