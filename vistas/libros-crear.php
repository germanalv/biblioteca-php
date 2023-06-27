<?php
//require('../general/vizualizar_errores.php');
require('../controlador/controlador.php');
$sidebar_op = 2; /* Maco como activo el menu "Libros" */
session_start();
checkLogin();

$titulo = $autor = $anio = $genero = $CantEjemplares = "";
$tituloError = $autorError = $anioError = $generoError = $CantEjemplaresError = "";

if(isset($_POST['submit'])){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Validación Titulo 
    **************************/
    $titulo = test_input($_POST["titulo"]);
    if (empty($titulo)) {
      $tituloError = "Inserte la titulo del libro";
    }elseif (!preg_match("/^[a-zA-Z-' ]*$/",$titulo)) {
      $nombreError = "Solo se permiten letras y espacios en blanco";
    }

    /* Validación Autor
    **************************/
    $autor = test_input($_POST["autor"]);
    if (empty($autor)) {
      $autorError = "Inserte el autor de libro";
    }elseif (!preg_match("/^[a-zA-Z-' ]*$/",$autor)) {
      $autorError = "Solo se permiten letras y espacios en blanco";
    }

    /* Validación Genero
    **************************/
    $genero = test_input($_POST["genero"]);
    if ($genero == '0') {
      $generoError = "Inserte el genero de libro"; /* OJO ACA!!!!!!! */
    }

    /* Validación Año
    **************************/
    $anio = test_input($_POST["anio"]); 
    if (empty($anio)) {
      $anioError = "Inserte el año del libro";
    }elseif (!preg_match("/^[0-9]*$/",$anio)) {
      $anioError = "Solo se permiten números";
    }

    /* Validación Cantidad de Ejemplares
    **************************/
    $CantEjemplares = test_input($_POST["CantEjemplares"]); 
    if (empty($CantEjemplares)) {
      $CantEjemplaresError = "Inserte el año del libro";
    }elseif (!preg_match("/^[0-9]*$/",$CantEjemplares)) {
      $CantEjemplaresError = "Solo se permiten números";
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
              <h1 class="text-center">Registrar Libro</h1>
            </div>
            <hr>
            <div class="row justify-content-center">
              <div class="col-6 border-end border-start">
              <form class="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


                <div class="mb-3">
                  <label for="" class="form-label">Titulo</label>
                  <input type="text" class="form-control" name="titulo">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Autor</label>
                  <input type="text" class="form-control" name="autor">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Genero</label>

                  <select class="form-select" aria-label="" name="genero">
                    <option value="0">Seleccionar Genero</option>
                    <option value="comedia">Comedia</option>
                    <option value="drama">Drama</option>
                    <option value="novela">Novela</option>
                    <option value="informatica">Informatica</option>
                    <option value="ciencia">Ciencia</option>
                    <option value="fantasia">Fantasia</option>
                  </select>

                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Año</label>
                  <select class="form-select" aria-label="" name="anio">
                    <?php
                    for ($i = 1900; $i < date("Y"); $i++) {
                      echo "<option value='".$i."'>".$i."</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Cantidad de Ejemplares</label>

                  <select class="form-select" aria-label="" name="CantEjemplares">
                    <?php
                    for ($i = 0; $i < 50; $i++) {
                      echo "<option value='".$i."'>".$i."</option>";
                    }
                    ?>
                  </select>
                  
                </div>

                <button type="submit" class="btn btn-primary">Guardar Libro</button>
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