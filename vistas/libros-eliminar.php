<?php
require('../controlador/controlador.php');

if(isset($_POST['btnEliminar'])){
    $id = $_POST['id'];
    if(eliminarLibro($id)){
        header("Location: libros.php");
    } else {
        
    }
}

?>