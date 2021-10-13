<?php

//RECIBO LOS DATOS DESDE EL FORMULARIO

$nombre = $_POST['nombre'];
$credito = $_POST['credito'];
$cuotas = $_POST['cuotas'];
$valorCuota = $_POST['valorCuota'];
$cobrador = $_POST['cobrador'];

//TRAIGO LA CONEXION DE LA BASE DE DATOS

include_once "../controllers/conexion.php";

//REALIZO LA QUERY PARA INSERTAR DATOS EN LA BASE DE DATOS

$query = "INSERT INTO creditos (nombre,credito,cuotas,valorCuota,cobrador_id) values 
('" . $nombre . "','" . $credito . "','" . $cuotas . "','" . $valorCuota . "','" . $cobrador . "');";
$res = mysqli_query($conexion, $query);
$creditoId = mysqli_insert_id($conexion);

$num = $cuotas;
$estado = "falta";
while ($num != 0) {
    $query2 = "INSERT INTO cuotas (credito_id,cobrador_id,valorCuota,estado) values 
    ('" . $creditoId . "','" . $cobrador . "','" . $valorCuota . "','" . $estado . "');";
    $res2 = mysqli_query($conexion, $query2);
    $num= $num -1;
}

//REDIRECCIONO

header("Location:../viewsCobradores/cobrador.php?id=$cobrador");

?>