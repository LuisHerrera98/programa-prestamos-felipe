<?php
$idCuota = $_POST['idCuota'];
$idCredito = $_POST['idCredito'];
$estado = $_POST['estado'];
$cobradorId = $_POST['idCobrador'];
$valorCuota = $_POST['valorCuota'];
$metodo = $_POST['metodo'];
$fecha = $_POST['fecha'];


include_once "../controllers/conexion.php";

$queryCobrador = "SELECT * FROM cobradores WHERE id='$cobradorId';";
$resCobrador = mysqli_query($conexion, $queryCobrador);
$row = mysqli_fetch_assoc($resCobrador);

$base = $row['base'];

if($metodo == "efectivo"){
    $estadoNuevo = "pagado";
    $base = $base + $valorCuota;
    $actualizar = "UPDATE cuotas SET estado='$estadoNuevo' WHERE id='$idCuota'";
    $resultado=mysqli_query($conexion,$actualizar);
}else{
    $estadoNuevo = "pagadoMercado";
    $actualizar = "UPDATE cuotas SET estado='$estadoNuevo' WHERE id='$idCuota'";
    $resultado=mysqli_query($conexion,$actualizar);
}

//AGREGO UN COBRO A LA FECHA CORRESPONDIENTE
$nombre = $_POST['nombre'];


$queryCobro = "INSERT INTO cobros (fecha,nombre,valorCuota,forma,id_cobrador) values ('" . $fecha . "','" . $nombre . "','" . $valorCuota . "','" . $metodo . "','" . $cobradorId . "');";
$resCobro = mysqli_query($conexion, $queryCobro);

mysqli_close ( $conexion );

header("Location:descontarCuota.php?id=$idCredito&cobradorId=$cobradorId&base=$base");


?>