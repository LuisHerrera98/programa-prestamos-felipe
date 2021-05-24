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
    <div class="caja-titulo">
        <h1>Nuevo Credito</h1>
    </div>
    <div class="caja-titulo-registro">
        <h2>Agregar nuevo credito</h2>
    </div>
    <div class="caja-registro">
        <form class="registro" action="../controllers/registrarCredito.php" method="POST">
            <label for="">Ingrese el nombre</label>
            
            <input type="text" name="nombre">

            <label for="">Ingrese el credito</label>
            
            <input type="number" name="credito">

            <label for="">Cantidad de cuotas</label>
            
            <input type="number" name="cuotas">

            <label for="">Valor de la cuota</label>
            
            <input type="number" name="valorCuota">

            <input type="hidden" name="cobrador" value="<?php echo $_GET['id'] ?>">

            <button class="boton-registro" type="submit"> 
                Agregar
            </button>
        </form>
    </div>
    
</body>
</html>