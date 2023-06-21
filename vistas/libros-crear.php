<?php
require('../controlador/controlador.php');


$sidebar_op = 2; /* Maco como activo el menu "Libros" */


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
              <h1 class="text-center">Registrar Libro</h1>
            </div>
            <hr>
            <div class="row justify-content-center">
              <div class="col-6 border-end border-start">
              <form class="">
                <div class="mb-3">
                  <label for="" class="form-label">Titulo</label>
                  <input type="text" class="form-control" name="titulo">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Autor</label>
                  <input type="text" class="form-control" name="autor">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Genero</label>
                  <input type="text" class="form-control" name="genero">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Año</label>
                  <input type="text" class="form-control" name="anio">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Cantidad de Ejemplares</label>
                  <input type="text" class="form-control" name="anio">
                </div>

                <button type="submit" class="btn btn-primary">Guardar Libro</button>
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