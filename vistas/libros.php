<?php
require('../general/vizualizar_errores.php');
require('../controlador/controlador.php');
checkLogin();
$sidebar_op = 2; /* Marco como activo el menu "Libros" */



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include '../layout/head.php';?>    
</head>

<body>
  <main class="d-flex flex-nowrap">
    <!-- Menu -->
    <?php include '../layout/sidebar.php';?>
  

    <div class="d-flex flex-column p-3 w-100 frame">
        <div class="container">
            <!-- Contenedor Principal -->
            <div class="row">
              <h2 class="text-center">Gestión de Libros</h2>
            </div>
            <hr>
            <div class="row">
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="libros-crear.php" class="btn btn-success mb-2">Registrar Libro</a>
              </div>
            </div>
            <div class="row">
              <?php if( !empty( $_GET['r'] ) ) { ?>
                <div class="alert alert-danger" role="alert my-2"><?=test_input($_GET['r'])?></div>
              <?php } ?>
            </div>
            <div class="row">
              
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Año</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $libros = getLibros();
                  // var_dump($libros);
                  foreach ($libros as $libro) {
                  ?>
                    <tr>
                      <td><?=$libro->getId()?></td>
                      <td><?=$libro->getTitulo()?></td>
                      <td><?=$libro->getAutor()?></td>
                      <td><?=$libro->getGenero()?></td>
                      <td><?=$libro->getAnio()?></td>
                      <td>
                        <div class="row">
                          <div class="col-3" >
                            <a class="btn btn-warning btn-sm pb-2" name="btnEditar" href="libros-editar.php?id=<?=$libro->getId()?>">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                              </svg>
                            </a>
                          </div>
                          <div class="col-3" >

                            <button type="button" class="btn btn-danger btn-sm pb-2" data-bs-toggle="modal" data-bs-target="#modalLibro<?=$libro->getId()?>">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                              </svg>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalLibro<?=$libro->getId()?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Eliminar Libro</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>

                                  <div class="modal-body">
                                    Confirma que desea eliminar el libro <?=$libro->getTitulo()?>
                                  </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    <form method="post" action="libros-eliminar.php">
                                      <input type="hidden" class="form-control" id="id" name="id" value="<?=$libro->getId()?>">
                                      <!-- <input class="btn btn-danger btnEliminarJ" name="btnEliminar" id="btnEliminar" value="Eliminar"/> -->
                                      <button class="btn btn-danger">Eliminar</button>
                                    </form>
                                  </div>

                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <hr>
            </div>
            <!-- Contenedor Principal -->
        </div>
    </div>


  </main>


  <!-- Menu de Pefil de usuario -->
  <?php include '../layout/footer.php';?>
</body>
</html>