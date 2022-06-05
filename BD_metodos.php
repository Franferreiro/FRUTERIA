<?php
require "Config/conexiones_BD.php";

function comprobarusuarios(){
    $base=conectar("admin");
    $sql=$base->prepare("SELECT * FROM usuarios ");
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    $sql=null;
    $base=null;
    return $resultado;

}
function registrarusuarios($nombre,$apellido,$correo,$telefono,$psw,$rol=2){
    try{
    $base=conectar("admin");
    $sql=$base->prepare("INSERT INTO usuarios(Nombre,Apellido,Correo,Telefono,Psw,Rol) VALUES(:nombre,:apellido,:correo,:telefono,:psw,:rol)");
    $sql->bindParam(":nombre",$nombre);
    $sql->bindParam(":apellido",$apellido);
    $sql->bindParam(":correo",$correo);
    $sql->bindParam(":telefono",$telefono);
    $sql->bindParam(":psw",$psw);
    $sql->bindParam(":rol",$rol);
    $sql->execute();
   $sql=null;
   $base=null;
    }catch(PDOException $e){
        print $e->getMessage();
    }

}

?>