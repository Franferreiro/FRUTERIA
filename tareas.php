<?php
session_start();

require "BD_metodos.php";
$pulsado = $_POST['pulsado'];
$respuesta = array();
switch ($pulsado) {
    case 'traerhuertos':
        $respuesta = traeruertos();
        break;

    case 'comprobarhoras':

        $respuesta = comprobarhoras($_POST["dia"], $_POST["id"]);
        break;
    case 'traersesion':
        $respuesta = $_SESSION;
        break;
    case 'insertarreserva':
        $respuesta = insertarreserva($_POST["idparcela"], $_POST["fecha"], $_POST["hora"], $_POST["idusuario"]);
        $respuesta2 = insertarhistorico($_POST["idusuario"], "Reserva");
        break;
    case 'traerproductos':
        $respuesta = traerproductos();
        break;
    case 'consultarproducto':
        $respuesta = obtenerproducto($_POST["id"]);
        break;
    case 'realizarcompra':
        $respuesta = realizarcompra($_POST["idusuario"], $_POST["total"]);
        $respuesta2 = insertarhistorico($_POST["idusuario"], "Compra");

        break;
    case 'insertarproductopedido':
        $respuesta = seleccionaridpedido();
        $respuesta2 = insertarproductoscompra($respuesta[0][0], $_POST["idproducto"], $_POST["cantidadproducto"]);
        $respuesta3=obtenerproducto($_POST["idproducto"]);
        $nuevacantidad=$respuesta3[0]["cantidad_disponible"] - $_POST["cantidadproducto"];
        $respuesta4=modificarcantidadproducto($_POST["idproducto"],$nuevacantidad);
        break;
        case 'traerterrenos':
            $respuesta=traerterrenos();
            break;
            case 'realizaralquiler':
                $respuesta=realizaralquiler($_POST["id"],$_POST["idusuario"],$_POST["fechainicio"],$_POST["fechafinal"]);
                $respuesta2= insertarhistorico($_POST["idusuario"], "Alquiler");
                $respuesta3=modificarestadoalquiler($_POST["id"],"ocupado");
                break;
};
echo json_encode($respuesta);
