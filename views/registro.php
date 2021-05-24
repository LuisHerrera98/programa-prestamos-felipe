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
        <h1>Bienvenido Felipe</h1>
    </div>
    <div class="caja-titulo-registro">
        <h2>Agregar nuevo cobrador</h2>
    </div>
    <div class="caja-registro">
        <form class="registro" action="../controllers/registrarCobrador.php" method="POST">
            <label for="">Ingrese el nombre</label>
            
            <input type="text" name="nombre">
            
            <label for="">Ingrese la base</label>
            
            <input type="number" name="base">

            <button class="boton-registro" type="submit"> 
                Agregar
            </button>
            <a style="font-weight: bold; margin-top:20px; padding-left:38px; padding-right:38px" href="../index.php" class="btn-agregar-cobrador">
            volver
            </a>
        </form>
    </div>
    
</body>
</html>