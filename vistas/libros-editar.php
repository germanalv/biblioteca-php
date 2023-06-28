<?php
require('../general/vizualizar_errores.php');
require('../controlador/controlador.php');
checkLogin();
checkRolAdmin();
$sidebar_op = 2; /* Marco como activo el menu "Libros" */

// Seteo e inicializo variables vacias.
$titulo = $autor = $anio = $genero = "";
$tituloError = $autorError = $anioError = $generoError = "";
$respuesta = "";
$nuevo_libro = "";

/* Obtengo los datos del libro a editar 
********************************************/
if(!empty($_GET['id'])){
  $libro = getLibro($_GET['id']);
  $titulo = $libro->getTitulo();
  $autor = $libro->getAutor();
  $genero = $libro->getGenero();
  $anio = $libro->getAnio();
  //var_dump($libro);
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

    if( (!empty($tituloError)) || (!empty($autorError)) || (!empty($generoError)) || 
        (!empty($anioError)) ){
        echo "Aca no!";
    }else{
      // Modificar usuario
      $nuevo_libro = new Libro ($_POST['id'], $titulo, $autor, $genero, $anio);
      $respuesta = setLibro($nuevo_libro);

      if (!empty($respuesta)) {
        if($respuesta['estado'] == 1){
          header("Location: libros.php?idusu=".$respuesta['resp']);
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
              <h1 class="text-center">Editar Libro</h1>
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
                  <label for="" class="form-label">Titulo</label><span class="error">* <?php echo $tituloError;?></span>
                  <input type="text" class="form-control" name="titulo" value="<?=$titulo?>">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Autor</label><span class="error">* <?php echo $autorError;?></span>
                  <input type="text" class="form-control" name="autor" value="<?=$autor?>">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Género</label><span class="error">* <?php echo $generoError;?></span>
                  <select class="form-select" aria-label="" name="genero">
                    <option value="1" <?php if ($genero == "comedia") echo "selected";?>>Comedia</option>
                    <option value="2" <?php if ($genero == "drama") echo "selected";?>>Drama</option>
                    <option value="3" <?php if ($genero == "novela") echo "selected";?>>Novela</option>
                    <option value="4" <?php if ($genero == "informatica") echo "selected";?>>Informática</option>
                    <option value="5" <?php if ($genero == "ciencia") echo "selected";?>>Ciencia</option>
                    <option value="6" <?php if ($genero == "fantasia") echo "selected";?>>Fantasia</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Año</label><span class="error">* <?php echo $anioError;?></span>
                  <select class="form-select" aria-label="" name="anio">
                    <?php
                    for ($i = 1900; $i < date("Y"); $i++) {
                      echo "<option value='".$i."'>".$i."</option>";
                    }
                    ?>
                  </select>
                </div>

                <input type="hidden" class="form-control" name="id" value="<?=$libro->getId()?>">

                <button type="submit" class="btn btn-primary" name="submit">Modificar Libro</button>
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