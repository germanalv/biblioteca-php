<?php
//require('../general/vizualizar_errores.php');
require('../controlador/controlador.php');
checkLogin();
$sidebar_op = 1; /* Maco como activo el menu "Libros" */

// Seteo e inicializo variables vacias.
$idLibro = $idUsuario = $fecha_prestamo = $fecha_devolucion = $estado = "";
$idLibroError = $idUsuarioError = $fecha_prestamoError = $fecha_devolucionError = $estadoError = "";

$respuesta = "";
$nuevo_prestamo = "";

if(isset($_POST['submit'])){

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Validación Genero
    **************************/
    $idUsuario = test_input($_POST["usuario"]);
    if ($idUsuario == '0') {
      $idUsuarioError = "Elija un usuario"; /* OJO ACA!!!!!!! */
    }

    /* Validación Genero
    **************************/
    $idLibro = test_input($_POST["libro"]);
    if ($idLibro == '0') {
      $idLibroError = "Ejija un libro"; /* OJO ACA!!!!!!! */
    }

    if( (!empty($idLibroError)) || (!empty($idUsuarioError)) ){



    }else{
      // Agregar préstamo
      $nuevo_prestamo = new Prestamo (0, $idLibro, $idUsuario, $fecha_prestamo, $fecha_devolucion, $estado);
      $respuesta = addPrestamo($nuevo_prestamo);

      if (!empty($respuesta)) {
        if($respuesta['estado'] == 1){
          header("Location: index.php?idusu=".$respuesta['resp']);
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
              <h1 class="text-center">Registrar Préstamo</h1>
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
                  <label for="" class="form-label">Usuario</label><span class="error">* <?php echo $idUsuarioError;?></span>
                  <select class="form-select" aria-label="" name="usuario">
                    <option value="0">Seleccionar usuario</option>
                    <?php
                    $usuarios = getUsuarios();
                    foreach ($usuarios as $usuario) {
                      echo "<option value='".$usuario->getId()."'>".$usuario->getNombre()." ".$usuario->getApellido()."</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Libro</label><span class="error">* <?php echo $idLibroError;?></span>
                  <select class="form-select" aria-label="" name="libro">
                  <option value="0">Seleccionar libro</option>
                    <?php
                    $libros = getLibros();
                    foreach ($libros as $libro) {
                      echo "<option value='".$libro->getId()."'>".$libro->getTitulo()." </option>";
                    }
                    ?>
                  </select>
                </div>
               

                <button type="submit" class="btn btn-primary" name="submit">Guardar Usuario</button>
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