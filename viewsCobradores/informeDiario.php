<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../styles/style.css">
    
    <title>Administrador</title>
</head>
<body>
    <?php
    $total = 0;
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
    $fecha = $_GET['fecha'];
    $cobradorId = $_GET['idCobrador'];
    $baseDiaria = 0;
?>
<script type="text/javascript">
    function ConfirmaBase(){
        var respuesta = confirm("¿Es correcta la base ingresada?");
        if (respuesta == true){
            return true;
        }else{
            return false;
        }
    }
</script>
    <h1 style="color:white; margin-left:20px;"><?php echo $fecha ?></h1>

    <div class="informe">
        <a style="background-color: red;" href="../CobradoresIndex.php">VOLVER AL INICIO</a>
    </div>
    <?php
        include_once "../controllers/conexion.php";
        $queryDia = "SELECT base FROM bases WHERE cobrador_id='$cobradorId' and fecha='$fecha';";
        $resDia = mysqli_query($conexion, $queryDia);
        $rowDia = mysqli_fetch_assoc($resDia);
        if($rowDia){ ?>
            <div style="display:flex; justify-content:center; align-items:center">
                <h2 style="margin:0; font-size:24px; color:white">Base : $<?php echo $rowDia['base']; ?> </h2>
            </div>
        <?php }else{ ?>
            <form action="../controllersCobrador/baseFecha.php" class="new-comentarios" method="POST">
                <label for="" style="margin:0; margin-bottom:10px">Ingresa tu base al comenzar hoy</label>
                <input type="number" name="base" style="font-size:20px; text-align:center;">

                <input type="hidden" name="fecha" value="<?php echo $_GET['fecha'] ?>"> 
                <input type="hidden" name="cobrador" value="<?php echo $_GET['idCobrador']?>">

                <button onclick="return ConfirmaBase()" class="boton-comentario" type="submit" style="margin-top:12px;margin-bottom:10px; width:250px; line-height:25px">
                    Agregar Base
                </button>
            </form>
       <?php } ?>
        
            
            
    
    <hr>
    <h2 style="color:white; margin-left:20px">Pagos en efectivo</h2>
    <?php
    include_once "../controllers/conexion.php";
    $efectivo = 'efectivo';
    $total = $baseDiaria;
    $idCobrador = $_GET['idCobrador'];
    $query = "SELECT * FROM cobros WHERE id_cobrador='$idCobrador' and fecha='$fecha' and forma='$efectivo' ;";
    $res = mysqli_query($conexion, $query);
    while($row = mysqli_fetch_assoc($res)){
        $total = $total + $row['valorCuota'];
    ?>
    <p href="" class="informe-dia" style="padding-left: 5px; margin-bottom:7px !important;margin-top:7px !important;">
        <?php echo $row['nombre'] . ':  $'.$row['valorCuota'] ?>
    </p>
    <?php
    }
    ?>
    <hr>
    <h2 style="color:white; margin-left:20px">Pagos por Mercado Pago</h2>   

    <?php
    include_once "../controllers/conexion.php";
    $mercadoPago = 'mercadoPago';
    $idCobrador = $_GET['idCobrador'];
    $queryMp = "SELECT * FROM cobros WHERE id_cobrador='$idCobrador' and fecha='$fecha' and forma='$mercadoPago' ;";
    $resMp = mysqli_query($conexion, $queryMp);
    while($rowMp = mysqli_fetch_assoc($resMp)){
    ?>
    <p href="" class="informe-dia" style="padding-left: 5px; margin-bottom:7px !important;margin-top:7px !important;color:white;background-color:blue;">
        <?php echo $rowMp['nombre'] . ':  $'.$rowMp['valorCuota'] ?>
    </p>
    <?php
    }
    ?>
    <hr>
    <h2 style="color:white; margin-left:20px">Gastos / pago</h2>   

    <?php
    include_once "../controllers/conexion.php";

    $idCobrador = $_GET['idCobrador'];
    $queryMp = "SELECT * FROM gastos WHERE cobrador_id='$idCobrador' and fecha='$fecha';";
    $resMp = mysqli_query($conexion, $queryMp);
    while($rowMp = mysqli_fetch_assoc($resMp))
    
    {
    ?>
    <p href="" class="informe-dia" style="padding-left: 5px; margin-bottom:7px !important;margin-top:7px !important;color:white;background-color:red;">
        <?php echo $rowMp['comentario'] . ':  $'.$rowMp['monto'] ?>
    </p>
    <?php
    $total = $total - $rowMp['monto'];
    $total = $total + $rowDia['base'];
    }
    ?>
    <hr>
    <div style="width:100%; display:flex; justify-content:center; align-items:center; flex-direction:column;">
        <div style="width:80%; background-color:gray; color:black; text-align:center; font-size:20px; border-radius:10px; margin-top:20px">
            <p style="margin:0">Total + Base - Gastos</p>
            <p style="margin:0">$<?php echo $total ?></p>
        </div>
        
    </div>
    <script type="text/javascript">
    function ConfirmaBorrarComentario(){
        var respuesta = confirm("¿Seguro de agregar este gasto?");
        if (respuesta == true){
            return true;
        }else{
            return false;
        }
    }
</script>
    <form method="POST" class="new-comentarios" action="../controllersCobrador/agregarGasto.php">
        <label for="" style="margin-top:30px;">Agregar gasto</label>

        <input type="text" name="comentario" style="font-size:18px" placeholder="detalle">

        <input type="hidden" name="fecha" value="<?php echo $_GET['fecha'] ?>">

        <input name="cobrador" type="hidden" value="<?php echo $idCobrador ?>">
        <br>
        <input type="number" name="monto" style="font-size:18px" placeholder="Ingrese el monto">
        <button onclick="return ConfirmaBorrarComentario()" class="boton-comentario" type="submit" style="margin-top:20px;">
            Agregar gasto
        </button>
    </form>
</body>
</html>







