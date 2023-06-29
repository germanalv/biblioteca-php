<?php

require('../controlador/controlador.php');

if(isset($_POST['id'])){

    $respuesta = eliminarPrestamo($_POST['id']);
    
    if($respuesta == "OK"){
        header("Location: index.php");
    } else {
        header("Location: index.php?r=$respuesta");
    }
}



?>