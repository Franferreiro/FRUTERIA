<?php
require "Config/conexiones_BD.php";

function listarusuarios(){
    $base=conectar("admin");
    $sql=$base->prepare("SELECT * FROM usuarios ");
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    $sql=null;
    $base=null;
    return $resultado;

}
function traerusuarioporcorreo($correo){
    try{
    $base=conectar("admin");
    $sql=$base->prepare("SELECT * FROM usuarios WHERE Correo=:correo");
    $sql->bindParam(":correo",$correo);
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    $sql=null;
    $base=null;
    return $resultado;
}catch(PDOException $e){
    print $e->getMessage();
}
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
function modificarperfil($id, $nombre, $apellido, $correo, $telefono,$img){
    try {
        $base = conectar("admin");
        $sql = $base->prepare("UPDATE usuarios SET Nombre=:nombre , Apellido=:apellido , Correo=:correo, Telefono=:telefono, Imagen=:img WHERE Id=:id");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':apellido', $apellido);
        $sql->bindParam(':correo', $correo);
        $sql->bindParam(':telefono', $telefono);
        $sql->bindParam(':img', $img);
        $sql->execute();

        $sql =  null;
        $base = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
function insertarhistorico($id, $tipo){
    try{
        $base=conectar("admin");
        $sql=$base->prepare("INSERT INTO historico(Id_usuario,tipo_operacion) VALUES(:id_usuario,:tipo_operacion)");
        $sql->bindParam(":id_usuario",$id);
        $sql->bindParam(":tipo_operacion",$tipo);
        $sql->execute();
        $sql=null;
        $base=null;
        }catch(PDOException $e){
            print $e->getMessage();
        }

}
function consultarhistoriausuario($id){
    try{
    $base=conectar("admin");
    $sql=$base->prepare("SELECT * FROM historico WHERE Id_usuario=:id ORDER BY fecha DESC LIMIT 5" );
    $sql->bindParam(":id",$id);
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    $sql=null;
    $base=null;
    return $resultado;
}catch(PDOException $e){
    print $e->getMessage();
}

}
function consultarhistoriausuarioporfecha($id,$inicio,$final){
    try{
    $base=conectar("admin");
    $sql=$base->prepare("SELECT * FROM historico WHERE Id_usuario=:id AND :inicio <= fecha  AND :final >= fecha ORDER BY fecha DESC " );
    $sql->bindParam(":id",$id);
    $sql->bindParam(":inicio",$inicio);
    $sql->bindParam(":final",$final);
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    $sql=null;
    $base=null;
    return $resultado;
}catch(PDOException $e){
    print $e->getMessage();
}

}
function consultarhistoriausuarioportipo($id,$tipo){
    try{
    $base=conectar("admin");
    $sql=$base->prepare("SELECT * FROM historico WHERE Id_usuario=:id AND tipo_operacion=:tipo_operacion  ORDER BY fecha DESC " );
    $sql->bindParam(":id",$id);
    $sql->bindParam(":tipo_operacion",$tipo);
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    $sql=null;
    $base=null;
    return $resultado;
}catch(PDOException $e){
    print $e->getMessage();
}
}
?>