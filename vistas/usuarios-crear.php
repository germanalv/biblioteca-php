<?php
require('../general/vizualizar_errores.php');
require('../controlador/controlador.php');
$sidebar_op = 3; /* Maco como activo el menu "Libros" */

//$nuevo_libro = new Libro(0, 'Libro 1', 'Carlos', 'Comedia', 2007, 5);

//echo addLibro($nuevo_libro);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../layout/head.php';?>
  <style>
  .error {color: #FF0000;}
  </style>
</head>

<?php
// Seteo e inicializo variables vacias.
$ci = $nombre = $apellido = $mail = $tel = $dir = "";
$ciError = $nombreError = $apellidoError = $mailError = $telError = $dirError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["ci"])) {
    $idError = "Inserte CI del usuario";
  } else {
    $ci = test_input($_POST["ci"]);
    // check if name only contains numbers and whitespace
    if (!preg_match("/^[0-9.-]{11}+$/",$ci)) {
      $ciError = "Solo se permiten números, puntos y guiones";
    }
  }
  if (empty($_POST["nombre"])) {
    $nombreError = "Inserte nombre del usuario";
  } else {
    $nombre = test_input($_POST["nombre"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
      $nombreError = "Solo se permiten letras y espacios en blanco";
    }
  }
  if (empty($_POST["apellido"])) {
    $apellidoError = "Inserte el apellido del usuario";
  } else {
    $apellido = test_input($_POST["apellido"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$apellido)) {
      $apellidoError = "Solo se permiten letras y espacios en blanco";
    }
  }
  if (empty($_POST["mail"])) {
    $mailError = "Inserte el mail del usuario";
  } else {
    $mail = test_input($_POST["mail"]);
    // check if e-mail address is well-formed
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $mailError = "Formato de email inválido";
    }
  }
  if (empty($_POST["tel"])) {
    $telError = "Inserte el teléfono del usuario";
  } else {
    $tel = test_input($_POST["tel"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$tel)) {
      $telError = "Solo se permiten números";
    }
  }
  if (empty($_POST["dir"])) {
    $dirError = "Inserte la dirección del usuario";
  } else {
    $dir = test_input($_POST["dir"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-0-9' ]*$/",$dir)) {
      $dirError = "Solo se permiten letras, números y espacios en blanco";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<body>
  <main class="d-flex flex-nowrap">
    <!-- Manu -->
    <?php include '../layout/sidebar.php';?>
  

    <div class="d-flex flex-column p-3 w-100 frame">
        <div class="container">
            <!-- Contenedor Principal -->
            <div class="row">
              <h1 class="text-center">Registrar Usuario</h1>
            </div>
            <hr>
            <div class="row justify-content-center">
              <div class="col-6 border-end border-start">
              
              <form class="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-3">
                  <label for="" class="form-label">CI</label><span class="error">* <?php echo $ciError;?></span>
                  <input type="text" class="form-control" name="ci">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Nombre</label></label><span class="error">* <?php echo $nombreError;?></span>
                  <input type="text" class="form-control" name="nombre">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Apellido</label></label><span class="error">* <?php echo $apellidoError;?></span>
                  <input type="text" class="form-control" name="apellido">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Email</label></label><span class="error">* <?php echo $mailError;?></span>
                  <input type="text" class="form-control" name="mail">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Teléfono</label></label><span class="error">* <?php echo $telError;?></span>
                  <input type="text" class="form-control" name="tel">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Dirección</label></label><span class="error">* <?php echo $dirError;?></span>
                  <input type="text" class="form-control" name="dir">
                </div>

                <button type="submit" class="btn btn-primary">Guardar Usuario</button>
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