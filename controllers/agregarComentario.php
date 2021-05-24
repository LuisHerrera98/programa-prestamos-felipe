<?php

//RECIBO LOS DATOS DESDE EL FORMULARIO

$comentario = $_POST['comentario'];
$idCredito = $_POST['idCredito'];
$idCobrador = $_POST['cobrador'];

//TRAIGO LA CONEXION DE LA BASE DE DATOS

include_once "conexion.php";

//REALIZO LA QUERY PARA INSERTAR DATOS EN LA BASE DE DATOS

$query = "INSERT INTO comentarios (credito_id,comentario) values ('" . $idCredito . "','" . $comentario . "');";
$res = mysqli_query($conexion, $query);

//REDIRECCIONO

header("Location:../views/credito.php?id=$idCredito&cobradorId=$idCobrador");

?>