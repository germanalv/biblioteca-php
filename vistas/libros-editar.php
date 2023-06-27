<?php
require('../general/vizualizar_errores.php');
require('../controlador/controlador.php');
$sidebar_op = 3; /* Marco como activo el menu "Libros" */

// Seteo e inicializo variables vacias.
$titulo = $autor = $anio = $genero = $CantEjemplares = "";
$tituloError = $autorError = $anioError = $generoError = $CantEjemplaresError = "";
$respuesta = "";
$nuevo_libro = "";


/* Obtengo los datos del libro a editar 
********************************************/
$idLibro = $_GET['id'];
if (!empty($idLibro)) {
  $libro = getLibro($idLibro);
  var_dump($libro);
  
}

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

    if( (!empty($ciError)) || (!empty($nombreError)) || (!empty($apellidoError)) || 
        (!empty($mailError)) || (!empty($telError)) || (!empty($dirError)) ){

          

    }else{
      // Modificar usuario
      $nuevo_usuario = new Usuario ($idUsuario, $ci, $nombre, $apellido, $mail, $tel, $dir);
      $respuesta = setUsuario($nuevo_usuario);

      if (!empty($respuesta)) {
        if($respuesta['estado'] == 1){
          header("Location: usuarios.php?idusu=".$respuesta['resp']);
        }
      }

    }

  }
}elseif(isset($_POST['btnEliminar'])){
  //Eliminación
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
              <h1 class="text-center">Editar Usuario</h1>
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
                  <label for="" class="form-label">CI</label><span class="error">* <?php echo $ciError;?></span>
                  <input type="text" class="form-control" name="ci" value="<?=$usuario->getCi()?>">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Nombre</label><span class="error">* <?php echo $nombreError;?></span>
                  <input type="text" class="form-control" name="nombre" value="<?=$usuario->getNombre()?>">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Apellido</label><span class="error">* <?php echo $apellidoError;?></span>
                  <input type="text" class="form-control" name="apellido" value="<?=$usuario->getApellido()?>">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Email</label><span class="error">* <?php echo $mailError;?></span>
                  <input type="text" class="form-control" name="mail" value="<?=$usuario->getMail()?>">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Teléfono</label><span class="error">* <?php echo $telError;?></span>
                  <input type="text" class="form-control" name="tel" value="<?=$usuario->getTel()?>">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Dirección</label><span class="error">* <?php echo $dirError;?></span>
                  <input type="text" class="form-control" name="dir" value="<?=$usuario->getDir()?>">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Modificar Usuario</button>
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