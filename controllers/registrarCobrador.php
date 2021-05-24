<?php

//RECIBO LOS DATOS DESDE EL FORMULARIO

$nombre = $_POST['nombre'];
$base = $_POST['base'];

//TRAIGO LA CONEXION DE LA BASE DE DATOS

include_once "conexion.php";

//REALIZO LA QUERY PARA INSERTAR DATOS EN LA BASE DE DATOS

$query = "INSERT INTO cobradores (nombre,base) values 
('" . $nombre . "','" . $base . "');";
$res = mysqli_query($conexion, $query);

//REDIRECCIONO

header("Location:../index.php");

?>