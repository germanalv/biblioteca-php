<?php
//require('../general/vizualizar_errores.php');
require('../controlador/controlador.php');
checkLogin();
$sidebar_op = 1; /* Marco como activo el menu "Préstamos" */

// Seteo e inicializo variables vacias.
$idLibro = $idUsuario = $fecha_prestamo = $fecha_devolucion = $estado = "";
$idLibroError = $idUsuarioError = $fecha_prestamoError = $fecha_devolucionError = $estadoError = "";

$respuesta = "";
$nuevo_prestamo = "";

if(isset($_POST['submit'])){

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Validación Fecha
    **************************/
    $fecha_devolucion = $_POST["fecha_devolucion"];
    if ($fecha_devolucion == '0') {
      $fecha_devolucionError = "Elija una fecha"; /* OJO ACA!!!!!!! */
    }

    if( (!empty($fecha_devolucionError)) ){



    }else{
      // Agregar préstamo
      $respuesta = devolverPrestamo($_POST["id"], $fecha_devolucion);

      if (!empty($respuesta)) {
        if($respuesta['estado'] == 1){
          header("Location: index.php");
        }
      }
    }

  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../layout/head.php';?>
</head>


<body>
  <main class="d-flex flex-nowrap">
    <!-- Manu -->
    <?php include '../layout/sidebar.php';?>

    <div class="d-flex flex-column p-3 w-100 frame">
        <div class="container">
            <!-- Contenedor Principal -->
            <div class="row">
              <h1 class="text-center">Devolver Préstamo</h1>
            </div>
            <hr>
            <div class="row justify-content-center">
              <div class="col-6 border-end border-start">
              
              <form class="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <?php 
                if (!empty($respuesta) && ($respuesta['estado'] == 0) ) {
                ?>
                    <div class="alert alert-danger" role="alert my-2"><?=$respuesta['resp']?></div>
                <?php 
                } 
                ?>

                <div class="mb-3">
                  <label for="" class="form-label">Fecha de devolución</label><span class="error">* <?php echo $idLibroError;?></span>
                  <input type="date" class="form-control" name="fecha_devolucion"/>
                  
                </div>
                
                <input type="hidden" class="form-control" name="id" value="<?=$_GET['id']?>">

                <button type="submit" class="btn btn-primary" name="submit">Devolver préstamo</button>
              </form>

              </div>
            </div>

            <!-- Contenedor Principal -->
        </div>
    </div>


  </main>


  <!-- Menu de Pefil de usuario -->
  <?php include '../layout/footer.php';?>
</body>
</html>