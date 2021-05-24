<?php

//RECIBO LOS DATOS DESDE EL FORMULARIO

$comentario = $_POST['comentario'];
$fecha = $_POST['fecha'];
$idCobrador = $_POST['cobrador'];
$monto = $_POST['monto'];

//TRAIGO LA CONEXION DE LA BASE DE DATOS

include_once "conexion.php";

//REALIZO LA QUERY PARA INSERTAR DATOS EN LA BASE DE DATOS

$query = "INSERT INTO gastos (comentario,fecha,cobrador_id,monto) values ('" . $comentario . "','" . $fecha . "','" . $idCobrador . "','" . $monto . "');";
$res = mysqli_query($conexion, $query);

//REDIRECCIONO

header("Location:../views/informeDiario.php?idCobrador=$idCobrador&fecha=$fecha");

?>