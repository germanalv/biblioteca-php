<?php
require('../controlador/controlador.php');
$sidebar_op = 1; /* Maco como activo el menu "Prestamos" */
checkLogin();
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
              <h2 class="text-center">Gestión de Préstamos</h2>
            </div>
            <hr>
            <div class="row">
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary mb-2">Registrar Préstamo</button>
              </div>
            </div>
            <div class="row">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Libro</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Fecha Préstamo</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Harry Potter</td>
                    <td>Juan Carlos</td>
                    <td>23/06/23</td>
                    <td>
                        <button class="btn btn-warning btn-sm mb-2">
                          Devolución
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <td>El Principito</td>
                    <td>Pedro</td>
                    <td>15/05/23</td>
                    <td>
                        <button class="btn btn-warning btn-sm mb-2">
                          Devolución
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <td>El Quijote</td>
                    <td>Alberto</td>
                    <td>07/06/23</td>
                    <td>
                        <button class="btn btn-warning btn-sm mb-2">
                          Devolución
                        </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- Contenedor Principal -->
        </div>
    </div>


  </main>


  <!-- Menu de Pefil de usuario -->
  <?php include '../layout/footer.php';?>
</body>
</html>