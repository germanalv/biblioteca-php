<?php 
//require('../general/vizualizar_errores.php');
require('../controlador/controlador.php');


/* Valido si existe un usuario logueado 
****************************************/


// Seteo e inicializo variables vacias.
$mail = $pass = "";
$mailError = $passError = $error = "";
if(isset($_POST['submit'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /* Validación Mail
        **************************/
        $mail = test_input($_POST["mail"]);
        if (empty($mail)) {
            $mailError = "Inresar mail del usuario<br>";
        }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mailError = "Formato de email inválido<br>";
        }

        /* Validación Pass
        **************************/
        $pass = test_input($_POST["password"]);
        if (empty($pass)) {
            $passError = "Ingresar Password<br>";
        }

        if ( empty($mailError) || empty($passError) ) {

            if(login($mail, $pass) ){
                header("Location: index.php");
            }else{
                $error = "Nombre de usuario o contraseña incorrectos.<br>";
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

<body class="d-flex align-items-center py-4 bg-body-tertiary bg-dark">
    <main class="form-signin w-100 m-auto bg-dark rounded h-50">
        <form class="m-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
            <h2 class="h3 mb-3 fw-normal text-center text-white">Bienvenido a la Biblioteca</h2>

            <?php 
                if ( !empty($mailError) || !empty($passError) || !empty($error) ) {
                ?>
                    <div class="alert alert-danger" role="alert my-2">
                        <?=$mailError?>
                        <?=$passError?>
                        <?=$error?>
                    </div>
                <?php 
                } 
                ?>

            <div class="form-floating">
                <input type="email" class="form-control" id="mail" name="mail" placeholder="Ingrese Mail">
                <label for="mail">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Iniciar Sesión</button>
        </form>
    </main>


    <!-- Menu de Pefil de usuario -->
    <?php include '../layout/footer.php';?>
</body>
</html>