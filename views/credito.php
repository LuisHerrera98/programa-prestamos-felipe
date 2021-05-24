<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    
    <title>Administrador</title>
</head>
<body>
<?php
    // include_once "db_empresa.php";
    include_once "../controllers/conexion.php";
    $id=$_GET['id'];
    $query = "SELECT * FROM creditos WHERE id='$id';";
    $res = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($res)
    ?>
    <div class="caja-titulo">
    
        <h1>Credito de <?php echo $row['nombre'] ?></h1>
    </div>
    <a href="cobrador.php?id=<?php echo $_GET['cobradorId'] ?>" style="width:100%; display:flex; justify-content:center; align-items:center">
        <div style="background-color: blue; width:200px; line-height:30px; text-align:center; font-weight:bold; font-size:18px; border-radius:20px; color:white;">
            Volver
        </div>
    </a>
    <?php
        $idCobrador = $_GET['cobradorId'];
        $queryCobrador = "SELECT * FROM cobradores WHERE id='$idCobrador';";
        $resCobrador = mysqli_query($conexion, $queryCobrador);
        $rowCobrador = mysqli_fetch_assoc($resCobrador);
    ?>
    <div class="caja-titulo-cobradores" style="font-size:18px">
        <h2>Base de <?php echo $rowCobrador['nombre'] ?> $<?php echo $rowCobrador['base'] ?></h2>
    </div>
    <hr>
    <div class="caja-titulo-cobradores">
        <h2>Cuotas de $<?php echo $row['valorCuota'] ?></h2>
    </div>
    
    <div class="caja-cuotas">
    <?php
    // include_once "db_empresa.php";
    
    $query2 = "SELECT * FROM cuotas WHERE credito_id='$id';";
    $res2 = mysqli_query($conexion, $query2);
    $numero = 0;
    while ($row2 = mysqli_fetch_assoc($res2)) {
        $numero++
    ?>
        <a href="<?php if($row2['estado'] == "falta") {?>pagoCuota.php?nombre=<?php echo $row['nombre'] ?>&idCuota=<?php echo $row2['id'] ?>&idCredito=<?php echo $id ?>&estado=<?php echo $row2['estado'] ?>&valor=<?php echo $row2['valorCuota']?>&cobradorId=<?php echo $_GET['cobradorId'] ?> <?php } ?>" class="caja-cuota" style="border-radius:8px;color:white;background-color:
        <?php if($row2['estado']=="falta"){?>
            red
        <?php }else if($row2['estado']=="pagado"){?>
            green 
        <?php 
        }else{?>
            blue
        <?php } ?>"><?php echo $numero ?></a>
    <?php
    }
    ?>
    </div>
    <br>
    <br>
    <br>
    <div class="titulo-comentarios">
        <h3>Comentarios</h3>
    </div>
    <div class="comentarios">
    <script type="text/javascript">
    function ConfirmaBorrarComentario(){
        var respuesta = confirm("Seguro de borrar el comentario?");
        if (respuesta == true){
            return true;
        }else{
            return false;
        }
    }
</script>
    <?php
    // include_once "db_empresa.php";
    
    $query3 = "SELECT * FROM comentarios WHERE credito_id='$id';";
    $res3 = mysqli_query($conexion, $query3);
    while ($row3 = mysqli_fetch_assoc($res3)) {
        $numero++
    ?>
        <div class="comentarios-div">
            
            <p class="" style="position: relative;"><?php echo $row3['comentario'] ?><a onclick="return ConfirmaBorrarComentario()" href="../controllers/borrarComentario.php?id=<?php echo $row3['id'] ?>&idCredito=<?php echo $id ?>&idCobrador=<?php echo $idCobrador ?>"><i class="fas fa-trash-alt" style="position:absolute; right:8px; top:5px; font-size:20px;color:black"></i></a></p>    
        </div>

        <?php
    }
        ?>
    </div>
    <form method="POST" class="new-comentarios" action="../controllers/agregarComentario.php">
        <label for="" style="margin-top:30px;">Agregar un nuevo comentario</label>
        <textarea name="comentario" rows="3" cols="30"></textarea>
        <input name="idCredito" type="hidden" value="<?php echo $id ?>">
        <input name="cobrador" type="hidden" value="<?php echo $_GET['cobradorId'] ?>">
        <button class="boton-comentario" type="submit">
            Agregar comentario
        </button>
    </form>
    
</body>
</html>