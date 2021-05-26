<?php

//RECIBO LOS DATOS DESDE EL FORMULARIO

$base = $_POST['base'];
$fecha = $_POST['fecha'];
$idCobrador = $_POST['cobrador'];


//TRAIGO LA CONEXION DE LA BASE DE DATOS

include_once "conexion.php";

//REALIZO LA QUERY PARA INSERTAR DATOS EN LA BASE DE DATOS

$query = "INSERT INTO bases (fecha,base,cobrador_id) values ('" . $fecha . "','" . $base . "','" . $idCobrador . "');";
$res = mysqli_query($conexion, $query);

//REDIRECCIONO

header("Location:../views/informeDiario.php?idCobrador=$idCobrador&fecha=$fecha");

?>