<?php
//require('../general/vizualizar_errores.php');
require('../controlador/controlador.php');
//checkLogin();
if ( !empty($_SESSION['nombre']) ) {
  checkRolAdmin();
}
$sidebar_op = 3; /* Maco como activo el menu "Libros" */

// Seteo e inicializo variables vacias.
$ci = $nombre = $apellido = $mail = $tel = $dir = $rol = $pass = "";
$ciError = $nombreError = $apellidoError = $mailError = $telError = $dirError = $rolError = $passError ="";
$respuesta = "";
$nuevo_usuario = "";



if(isset($_POST['submit'])){

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Validación Cedula 
    **************************/
    $ci = test_input($_POST["ci"]);
    if (empty($ci)) {
      $ciError = "Inserte la CI del usuario";
    }elseif (!preg_match("/^[0-9-. ]+$/",$ci)) {
      $ciError = "Solo se permiten números, puntos y guiones";
    }

    /* Validación Nombre
    **************************/
    $nombre = test_input($_POST["nombre"]);
    if (empty($nombre)) {
      $nombreError = "Inserte nombre del usuario";
    }elseif (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
      $nombreError = "Solo se permiten letras y espacios en blanco";
    }

    /* Validación Apellido
    **************************/
    $apellido = test_input($_POST["apellido"]);
    if (empty($apellido)) {
      $apellidoError = "Inserte el apellido del usuario";
    }elseif (!preg_match("/^[a-zA-Z-' ]*$/",$apellido)) {
      $apellidoError = "Solo se permiten letras y espacios en blanco";
    }

    /* Validación Mail
    **************************/
    $mail = test_input($_POST["mail"]);
    //$usu = getUsuarioByMail($mail);
    if (empty($mail)) {
      $mailError = "Inserte el mail del usuario";
    }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $mailError = "Formato de email inválido";
    }elseif ( !empty( getUsuarioByMail($mail) ) ) {
      $mailError = "El mail ya existe";
    }
    
    /* $usu = getUsuarioByMail($mail);
    if ( empty( $usu ) ) {
      $mailError = "El mail ya existe";
    } */

    /* Validación Telefono
    **************************/
    $tel = test_input($_POST["tel"]); 
    if (empty($tel)) {
      $telError = "Inserte el teléfono del usuario";
    }elseif (!preg_match("/^[0-9]*$/",$tel)) {
      $telError = "Solo se permiten números";
    }

    /* Validación Direccion
    **************************/
    $dir = test_input($_POST["dir"]);
    if (empty($dir)) {
      $dirError = "Inserte la dirección del usuario";
    }elseif (!preg_match("/^[a-zA-Z-0-9' ]*$/",$dir)) {
      $dirError = "Solo se permiten letras, números y espacios en blanco";
    }

    /* Validación Rol
    **************************/
    $rol = test_input($_POST["rol"]); 
    if ($rol == "0") {
      $rolError = "Debe seleccionar un rol";
    }

    /* Validación Password
    **************************/
    $pass = test_input($_POST["pass"]);
    if (empty($pass)) {
      $passError = "Inserte el password";
    }

    if( (!empty($ciError)) || (!empty($nombreError)) || (!empty($apellidoError)) || 
        (!empty($mailError)) || (!empty($telError)) || (!empty($dirError)) || (!empty($rolError)) || (!empty($passError)) ){

          

    }else{
      // Grabar usuario
      $nuevo_usuario = new Usuario (0, $ci, $nombre, $apellido, $mail, $tel, $dir, $rol, $pass) ;
      $respuesta = addUsuario($nuevo_usuario);

      if (!empty($respuesta)) {
        if($respuesta['estado'] == 1){
          if ( $_POST['notSession'] == "1" ) {
            header("Location: login.php?idusu=".$respuesta['resp']);
          }else{
            header("Location: usuarios.php?idusu=".$respuesta['resp']); 
          }
          
          

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
                  <label for="" class="form-label">CI</label><span class="error">* <?php echo $ciError;?></span>
                  <input type="text" class="form-control" name="ci">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Nombre</label><span class="error">* <?php echo $nombreError;?></span>
                  <input type="text" class="form-control" name="nombre">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Apellido</label><span class="error">* <?php echo $apellidoError;?></span>
                  <input type="text" class="form-control" name="apellido">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Email</label><span class="error">* <?php echo $mailError;?></span>
                  <input type="text" class="form-control" name="mail">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Teléfono</label><span class="error">* <?php echo $telError;?></span>
                  <input type="text" class="form-control" name="tel">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Dirección</label><span class="error">* <?php echo $dirError;?></span>
                  <input type="text" class="form-control" name="dir">
                </div>
                
                <div class="mb-3">
                  <label for="" class="form-label">Rol</label><span class="error">* <?php echo $rolError;?></span>
                  <select class="form-select" aria-label="" name="rol">
                    <option value="0">Seleccionar Rol</option>
                    <?php 
                    if ( empty($_GET['r']) ) {
                    ?>
                    <option value="1">Administrador</option>
                    <?php 
                    } 
                    ?>
                    <option value="2">General</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="" class="form-label">Password</label><span class="error">* <?php echo $passError;?></span>
                  <input type="password" class="form-control" name="pass">
                </div>
                
                <?php 
                if ( !empty($_GET['r']) ) {
                ?>
                    <input type="hidden" name="notSession" value="1"/>
                <?php 
                } 
                ?>
                
                

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