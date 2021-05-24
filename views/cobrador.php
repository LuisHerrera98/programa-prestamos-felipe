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
    $query = "SELECT * FROM cobradores WHERE id='$id';";
    $res = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($res)
    ?>
    <div class="caja-titulo">
        <h1>Perfil de <?php echo $row['nombre'] ?></h1>
    </div>
    <a href="perfilCobrador.php?id=<?php echo $_GET['id'] ?>" style="width:100%; display:flex; justify-content:center; align-items:center">
        <div style="background-color: blue; width:200px; line-height:30px; text-align:center; font-weight:bold; font-size:18px; border-radius:20px; color:white;">
            Volver
        </div>
    </a>
    <div class="caja-titulo-cobradores">
        <h2>Lista de montos</h2>
    </div>
    <div class="caja-cobradores">
    <?php
    // include_once "db_empresa.php";
    include_once "../controllers/conexion.php";
    $query2 = "SELECT * FROM creditos WHERE cobrador_id='$id';";
    $res2 = mysqli_query($conexion, $query2);
    while ($row2 = mysqli_fetch_assoc($res2)) {
    ?>
        <a href="credito.php?id=<?php echo $row2['id']?>&cobradorId=<?php echo $id ?>" class="link-creditos" style="text-decoration:none; color:black">
            <div class="detalles-credito">
                <p>Nombre: <?php echo $row2['nombre'] ?></p>
                <p>Monto: $<?php echo $row2['credito'] ?></p>
                <p>Cuotas: <?php echo $row2['cuotas'] ?></p>
                <p>Valor de cuota: $<?php echo $row2['valorCuota'] ?></p>                
            </div>
        </a>
        <?php
    }
        ?>
        <a href="nuevoCredito.php?id=<?php echo $_GET['id'] ?>&nombre=<?php echo $_GET['id'] ?>" class="btn-agregar-cobrador">
            Agregar Credito
        </a>
    </div>
</body>
</html>