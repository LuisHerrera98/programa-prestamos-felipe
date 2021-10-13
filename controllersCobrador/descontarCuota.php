<?php
$idCredito = $_GET['id'];
$idCobrador = $_GET['cobradorId'];
$base = $_GET['base'];

include_once "conexion.php";
$actualizar = "UPDATE cobradores SET base='$base' WHERE id='$idCobrador'";
$resultado=mysqli_query($conexion,$actualizar);

header("Location:../viewsCobradores/credito.php?id=$idCredito&cobradorId=$idCobrador");
?>