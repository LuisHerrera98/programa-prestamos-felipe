<?php

include_once "conexion.php";


$idCredito = $_GET['idCredito'];
$consulta = "DELETE FROM creditos WHERE id='$idCredito'";
$res = mysqli_query($conexion,$consulta);

$consulta2 = "DELETE FROM cuotas WHERE credito_id='$idCredito'";
$res2 = mysqli_query($conexion,$consulta2);

header("Location:../index.php");

?>