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
    // include_once "db_empresa.php";
    include_once "../controllers/conexion.php";
    $id=$_GET['id'];
    $query = "SELECT nombre FROM cobradores WHERE id='$id';";
    $res = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($res)
    ?>
    <br>
    <div class="caja-titulo">
        <h1>Perfil de <?php echo $row['nombre'] ?></h1>
    </div>
    <div class="informe">
        <a style="background-color: red;" href="../index.php">VOLVER AL INICIO</a>
    </div>
    <br>
    <br>
    
    <div class="informe">
        <a href="informesDiario.php?id=<?php echo $id ?>">Ver informes diarios</a>
    </div>
    <div class="lista">
        <a href="cobrador.php?id=<?php echo $_GET['id'] ?>">Ver lista de montos</a>
    </div>
</body>
</html>