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

    <h1 style="color:white; margin-left:20px; margin-bottom:10px">Informes diarios</h1>
    <div class="informe">
        <a style="background-color: red;" href="../index.php">VOLVER AL INICIO</a>
    </div>
    <?php
    include_once "../controllers/conexion.php";
//WHERE id='$id'
    $query = "SELECT * FROM cobros ORDER BY id DESC;";
    $res = mysqli_query($conexion, $query);
    $fechaCambiante = "";
    while($row = mysqli_fetch_assoc($res)){
    ?>
    <?php
        if($row['fecha']!=$fechaCambiante){
            $fechaCambiante = $row['fecha'];
            ?>
            
            <a href="informeDiario.php?idCobrador=<?php echo $_GET['id'] ?>&fecha=<?php echo $row['fecha'] ?>" class="informe-dia">
                Dia: <?php echo $row['fecha'] ?>
            </a>
        <?php
        }
    }
    ?>
</body>
</html>







