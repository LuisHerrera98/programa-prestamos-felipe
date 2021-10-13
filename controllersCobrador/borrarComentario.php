<?php

include_once "../controllers/conexion.php";

$idComentario = $_GET['id'];
$idCredito = $_GET['idCredito'];
$idCobrador = $_GET['idCobrador'];

$consulta = "DELETE FROM comentarios WHERE id='$idComentario'";
$res = mysqli_query($conexion,$consulta);

header("Location:../viewsCobradores/credito.php?id=$idCredito&cobradorId=$idCobrador");

?>