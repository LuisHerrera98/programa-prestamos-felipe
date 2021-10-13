<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/moneda.jpg">
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
        <a style="width:90%;" href="viewsCobradores/perfilCobrador.php?id=<?php echo $row['id'] ?>">
            <div style="height:40px;">
                <div class="caja-detalles" style="margin: 0;">
                    <h3 style="margin:0;"><?php echo strtoupper($row['nombre']) ?></h3>
                </div>
            </div>
        </a>
        <?php
    }
        ?>
        
    </div>
</body>
</html>