<?php

include_once "conexion.php";

$idComentario = $_GET['id'];
$idCredito = $_GET['idCredito'];
$idCobrador = $_GET['idCobrador'];

$consulta = "DELETE FROM comentarios WHERE id='$idComentario'";
$res = mysqli_query($conexion,$consulta);

header("Location:../views/credito.php?id=$idCredito&cobradorId=$idCobrador");

?>