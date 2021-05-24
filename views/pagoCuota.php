<?php
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    setlocale (LC_TIME, "es_RA");
    $hora = date("l d \of-F-Y");
    if($hora){
        $hora = str_replace("Monday","Lunes",$hora);
        $hora = str_replace("-"," ",$hora);
        $hora = str_replace("of","de",$hora);
    }
    if($hora){
        $hora = str_replace("Tuesday","Martes",$hora);
    }
    if($hora){
        $hora = str_replace("Wednesday","Miercoles",$hora);
    }
    if($hora){
        $hora = str_replace("Thursday","Jueves",$hora);
    }
    if($hora){
        $hora = str_replace("Friday","viernes",$hora);
    }
    if($hora){
        $hora = str_replace("Saturday","Sabado",$hora);
    }
    if($hora){
        $hora = str_replace("Sunday","Domingo",$hora);
    }
    if($hora){
        $hora = str_replace("January","Enero",$hora);
    }
    if($hora){
        $hora = str_replace("February","Febrero",$hora);
    }
    if($hora){
        $hora = str_replace("March","Marzo",$hora);
    }
    if($hora){
        $hora = str_replace("April","Abril",$hora);
    }
    if($hora){
        $hora = str_replace("May","Mayo",$hora);
    }
    if($hora){
        $hora = str_replace("June","Junio",$hora);
    }
    if($hora){
        $hora = str_replace("July","Julio",$hora);
    }
    if($hora){
        $hora = str_replace("August","Agosto",$hora);
    }
    if($hora){
        $hora = str_replace("September","Septiembre",$hora);
    }
    if($hora){
        $hora = str_replace("October","Octubre",$hora);
    }
    if($hora){
        $hora = str_replace("November","Noviembre",$hora);
    }
    if($hora){
        $hora = str_replace("December","Diciembre",$hora);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../styles/style.css">
    
    <title>CobroCuota</title>
</head>
<body>
<script type="text/javascript">
    function ConfirmaPago(){
        var respuesta = confirm("Es correcto el metodo de pago?");
        if (respuesta == true){
            return true;
        }else{
            return false;
        }
    }
</script>
<div class="caja-forma-pago">
<?php
//OBTENGO EL NOMBRE DE LA PERSONA QUE TOMO EL CREDITO Y EL VALOR DE LA CUOTA
    // include_once "db_empresa.php";
    include_once "../controllers/conexion.php";
    $idCredito=$_GET['idCredito'];
    $query = "SELECT * FROM creditos WHERE id='$idCredito';";
    $res = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($res)
?>
<form class="forma-pago" method="POST" action="../controllers/cobrarCuota.php">
            <input type="hidden" name="nombre" value="<?php echo $_GET['nombre'] ?>">
            <input type="hidden" name="estado" value="<?php echo $_GET['estado'] ?>">
            <input type="hidden" name="nombre" value="<?php echo $row['nombre'] ?>">
            <input type="hidden" name="valorCuota" value="<?php echo $_GET['valor'] ?>">
            <input type="hidden" name="fecha" value="<?php echo $hora ?>">
            <input type="hidden" name="idCuota" value="<?php echo $_GET['idCuota'] ?>">
            <input type="hidden" name="idCobrador" value="<?php echo $_GET['cobradorId'] ?>">
            <input type="hidden" name="idCredito" value="<?php echo $_GET['idCredito'] ?>">
            <h3 style="margin: 0;">Cobro a <?php echo $row['nombre'] ?></h3>
            <h3>Valor Cuota: $<?php echo $row['valorCuota'] ?></h3>
            <select name="metodo" id="">
                <option value="efectivo" selected>Efectivo</option>
                <option value="mercadopago">Mercado Pago</option>
            </select>
            <br>
            <button type="submit" onclick="return ConfirmaPago()">Cobrar</button>
    </form>
</div>

</body>
</html>