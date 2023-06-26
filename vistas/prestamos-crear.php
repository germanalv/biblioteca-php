<?php
require('../general/vizualizar_errores.php');
require('../controlador/controlador.php');
$sidebar_op = 3; /* Maco como activo el menu "Libros" */

// Seteo e inicializo variables vacias.
$idUsuario = "";
$idUsuarioError =  "";


$respuesta = "";
$nuevo_usuario = "";



if(isset($_POST['submit'])){

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

   

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
              <h1 class="text-center">Registrar Usuario</h1>
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
                  <label for="" class="form-label">CI</label><span class="error">* <?php echo $idUsuarioError;?></span>
                  <select class="form-select" aria-label="" name="usuario">
                    <?php
                    $usuarios = getUsuarios();
                    foreach ($usuarios as $usuario) {
                      echo "<option value='".$usuario->getId()."'>".$usuario->getNombre()." ".$usuario->getApellido()."</option>";
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