<?php

require('../controlador/controlador.php');

if(isset($_POST['id'])){

    $respuesta = eliminarUsuario($_POST['id']);
    
    if($respuesta == "OK"){
        header("Location: usuarios.php");
    } else {
        header("Location: usuarios.php?r=$respuesta");
    }
}



?>