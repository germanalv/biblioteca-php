<?php
require('../controlador/controlador.php');

/* if(isset($_POST['btnEliminar'])){
    $id = $_POST['id'];
    if(eliminarLibro($id)){
        header("Location: libros.php");
    } else {
        
    }
} */

if(isset($_POST['id'])){

    $respuesta = eliminarlibro($_POST['id']);
    
    if($respuesta == "OK"){
        header("Location: libros.php");
    } else {
        header("Location: libros.php?r=$respuesta");
    }
}

?>