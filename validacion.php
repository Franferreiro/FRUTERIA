<?php
function test_input($data) {
    $datos = trim($data);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}
function validarnombres($nombre){
    if (is_string($nombre)) {
       
        return $nombre;
    } else {
        return false;
    }

}
function validaremail($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
       
        return $email;
    } else {
        return false;
    }

}
function validartelefono($numero){
    if(is_numeric($numero) && strlen($numero)==9){
        return $numero;
    }else
     return false;
}
function comprobarpsw($psw1,$psw2){
    if (strcmp($psw1, $psw2) !== 0) {
       return $psw1;
    }else return false;
}
?>