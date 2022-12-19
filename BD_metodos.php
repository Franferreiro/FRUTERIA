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
function listarproductos(){
    $base=conectar("admin");
    $sql=$base->prepare("SELECT * FROM productos ");
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    $sql=null;
    $base=null;
    return $resultado;

}
function listarterrenos(){
    $base=conectar("admin");
    $sql=$base->prepare("SELECT * FROM terrenos_alquilables ");
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    $sql=null;
    $base=null;
    return $resultado;

}
function traeruertos(){
   
        $base=conectar("admin");
        $sql=$base->prepare("SELECT * FROM parcelas");
       
        $sql->execute();
        $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        $sql=null;
        $base=null;
        return $resultado;

}
function realizaralquiler($id,$idusuario,$fechaini,$fechafin){
    try{
        $base=conectar("admin");
        $sql=$base->prepare("INSERT INTO alquileres(id_terreno,id_usuario,fecha_inicio,fecha_final) VALUES(:id_terreno,:id_usuario,:fecha_inicio,:fecha_final)");
        $sql->bindParam(":id_usuario",$idusuario);
        $sql->bindParam(":id_terreno",$id);
        $sql->bindParam(":fecha_inicio",$fechaini);
        $sql->bindParam(":fecha_final",$fechafin);
        $sql->execute();
        $sql=null;
        $base=null;
        }catch(PDOException $e){
            print $e->getMessage();
        }


}
function modificarestadoalquiler($id,$estado){
    try {
        $base = conectar("admin");
        $sql = $base->prepare("UPDATE terrenos_alquilables SET estado=:estado  WHERE Id=:id");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':estado', $estado);
      
        $sql->execute();

        $sql =  null;
        $base = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }

}
function traerterrenos(){
    
    $base=conectar("admin");
    $sql=$base->prepare("SELECT * FROM terrenos_alquilables");
   
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    $sql=null;
    $base=null;
    return $resultado;


}
function modificarcantidadproducto($id,$cantidad){
    try {
        $base = conectar("admin");
        $sql = $base->prepare("UPDATE productos SET cantidad_disponible=:cantidad  WHERE Id=:id");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':cantidad', $cantidad);
      
        $sql->execute();

        $sql =  null;
        $base = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
function obtenerproducto($id){
    try{
        $base=conectar("admin");
        $sql=$base->prepare("SELECT * FROM productos WHERE Id=:id");
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
function obtenerterreno($id){
    try{
        $base=conectar("admin");
        $sql=$base->prepare("SELECT * FROM terrenos_alquilables WHERE Id=:id");
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
function seleccionaridpedido(){
    $base=conectar("admin");
    $sql=$base->prepare("SELECT MAX(id) FROM pedido ");
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_NUM);
    $sql=null;
    $base=null;
    return $resultado;

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
function insertarproductoscompra($idpedido,$idproducto,$cantidad){
    try{
        $base=conectar("admin");
        $sql=$base->prepare("INSERT INTO productos_pedido(id_pedido,id_producto,cantidad) VALUES(:id_pedido,:id_producto,:cantidad)");
        $sql->bindParam(":id_pedido",$idpedido);
        $sql->bindParam(":id_producto",$idproducto);
        $sql->bindParam(":cantidad",$cantidad);
        $sql->execute();
        $sql=null;
        $base=null;
        }catch(PDOException $e){
            print $e->getMessage();
        }
}
function realizarcompra($id,$total){
    try{
        $base=conectar("admin");
        $sql=$base->prepare("INSERT INTO pedido(id_usuario,precio_total) VALUES(:id_usuario,:precio_total)");
        $sql->bindParam(":id_usuario",$id);
        $sql->bindParam(":precio_total",$total);
        $sql->execute();
        $sql=null;
        $base=null;
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
function listarparcelas(){
    $base=conectar("admin");
    $sql=$base->prepare("SELECT * FROM parcelas ");
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    $sql=null;
    $base=null;
    return $resultado;

}
function traerproductos(){
    $base=conectar("admin");
    $sql=$base->prepare("SELECT * FROM productos ");
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    $sql=null;
    $base=null;
    return $resultado;

}
function buscarparcelaportipo($tipo){
    $base=conectar("admin");
    $sql=$base->prepare("SELECT * FROM parcelas WHERE tipo=:tipo ");
    $sql->bindParam(":tipo",$tipo);
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    $sql=null;
    $base=null;
    return $resultado;

}
function comprobarhoras($dia,$id){
    $base=conectar("admin");
    $sql=$base->prepare("SELECT hora FROM reservas WHERE fecha=:dia AND Id_parcela=:id");
    $sql->bindParam(":dia",$dia);
    $sql->bindParam(":id",$id);
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_NUM);
    $sql=null;
    $base=null;
    return $resultado;
}
function insertarreserva( $idparcela, $fecha, $hora, $idusuario){
    try{
        $base=conectar("admin");
        $sql=$base->prepare("INSERT INTO reservas(Id_parcela,fecha,hora,Id_usuario) VALUES(:id_parcela,:fecha,:hora,:idusuario)");
        $sql->bindParam(":id_parcela",$idparcela);
        $sql->bindParam(":fecha",$fecha);
        $sql->bindParam(":hora",$hora);
        $sql->bindParam(":idusuario",$idusuario);
        $sql->execute();
        $sql=null;
        $base=null;
        }catch(PDOException $e){
            print $e->getMessage();
        }

}
function añadirrhuerto( $tipo, $precio, $metros, $imagen,$descripcion){
    try {
        $base = conectar("admin");
        $sql=$base->prepare("INSERT INTO parcelas(tipo,precio,metros,imagen,descripcion) VALUES(:tipo,:precio,:metros,:imagen,:descripcion)");
        $sql->bindParam(':tipo', $tipo);
        $sql->bindParam(':precio', $precio);
        $sql->bindParam(':metros', $metros);
        $sql->bindParam(':imagen', $imagen);
        $sql->bindParam(':descripcion', $descripcion);
       
        $sql->execute();

        $sql =  null;
        $base = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
function añadirterreno( $tamaño, $precio, $foto, $estado){
    try {
        $base = conectar("admin");
        $sql=$base->prepare("INSERT INTO terrenos_alquilables(tamaño,precio,foto,estado) VALUES(:tamano,:precio,:foto,:estado)");
        $sql->bindParam(':tamano', $tamaño);
        $sql->bindParam(':precio', $precio);
        $sql->bindParam(':foto', $foto);
        $sql->bindParam(':estado', $estado);
        $sql->execute();
        $sql =  null;
        $base = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
function añadirproducto( $nombre, $tipo, $foto, $precio,$cantidad,$descripcion){
    try {
        $base = conectar("admin");
        $sql=$base->prepare("INSERT INTO productos(nombre,tipo,foto,precio,cantidad_disponible,descripcion) VALUES(:nombre,:tipo,:foto,:precio,:cantidad,:descripcion)");
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':tipo', $tipo);
        $sql->bindParam(':foto', $foto);
        $sql->bindParam(':precio', $precio);
        $sql->bindParam(':cantidad', $cantidad);
        $sql->bindParam(':descripcion', $descripcion);
       
        $sql->execute();

        $sql =  null;
        $base = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
function borrarrhuerto( $id){
    try {
        $base = conectar("admin");
        $sql=$base->prepare("DELETE FROM parcelas WHERE Id=:id");
        $sql->bindParam(':id', $id);       
        $sql->execute();
        $sql =  null;
        $base = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
function borrarrterreno( $id){
    try {
        $base = conectar("admin");
        $sql=$base->prepare("DELETE FROM terrenos_alquilables WHERE Id=:id");
        $sql->bindParam(':id', $id);       
        $sql->execute();
        $sql =  null;
        $base = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
function borrarrproducto( $id){
    try {
        $base = conectar("admin");
        $sql=$base->prepare("DELETE FROM productos WHERE Id=:id");
        $sql->bindParam(':id', $id);       
        $sql->execute();
        $sql =  null;
        $base = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
function buscarparcelaporid($id){
    $base=conectar("admin");
    $sql=$base->prepare("SELECT * FROM parcelas WHERE Id=:id ");
    $sql->bindParam(":id",$id);
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    $sql=null;
    $base=null;
    return $resultado;

}
function modificarhuerto( $id, $tipo, $precio, $metros, $imagen,$descripcion){
    try {
        $base = conectar("admin");
        $sql = $base->prepare("UPDATE parcelas SET tipo=:tipo , precio=:precio , metros=:metros, imagen=:imagen, descripcion=:descripcion WHERE Id=:id");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':tipo', $tipo);
        $sql->bindParam(':precio', $precio);
        $sql->bindParam(':metros', $metros);
        $sql->bindParam(':imagen', $imagen);
        $sql->bindParam(':descripcion', $descripcion);
        $sql->execute();

        $sql =  null;
        $base = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
function modificarproducto( $id,$nombre, $foto, $precio, $cantidad,$descripcion){
    try {
        $base = conectar("admin");
        $sql = $base->prepare("UPDATE productos SET nombre=:nombre , foto=:foto , precio=:precio, cantidad_disponible=:cantidad, descripcion=:descripcion WHERE Id=:id");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':foto', $foto);
        $sql->bindParam(':precio', $precio);
        $sql->bindParam(':cantidad', $cantidad);
        $sql->bindParam(':descripcion', $descripcion);
        $sql->execute();

        $sql =  null;
        $base = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
function modificarterreno( $id,$tamaño,$precio, $foto, $estado){
    try {
        $base = conectar("admin");
        $sql = $base->prepare("UPDATE terrenos_alquilables SET tamaño=:tamaño, precio=:precio, foto=:foto,estado=:estado WHERE Id=:id");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':tamaño', $tamaño);
        $sql->bindParam(':foto', $foto);
        $sql->bindParam(':precio', $precio);
        $sql->bindParam(':estado', $estado);
       
        $sql->execute();

        $sql =  null;
        $base = null;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
?>