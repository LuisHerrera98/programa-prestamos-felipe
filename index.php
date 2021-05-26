<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styles/style.css">
    
    <title>Administrador</title>
</head>
<body>
    <div class="caja-titulo">
        <h1>Admin Felipe</h1>
    </div>
    <div class="caja-titulo-cobradores">
        <h2>Lista de cobradores</h2>
    </div>
    <div class="caja-cobradores">
    <?php
    // include_once "db_empresa.php";
    include_once "controllers/conexion.php";
    $query = "SELECT * FROM cobradores;";
    $res = mysqli_query($conexion, $query);
    while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <a href="views/perfilCobrador.php?id=<?php echo $row['id'] ?>">
            <div>
                <div class="caja-imagen">
                    <img src="images/german.jpg" alt="">
                </div>
                <div class="caja-detalles" style="margin: 0;">
                    <h3 style="margin:0;"><?php echo strtoupper($row['nombre']) ?></h3>
                </div>
            </div>
        </a>
        <?php
    }
        ?>
        <a href="views/registro.php" class="btn-agregar-cobrador">
            Agregar Cobrador
        </a>
    </div>
</body>
</html>