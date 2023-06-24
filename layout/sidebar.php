
<?php
$prestamos_opc = "text-white";
$libros_opc = "text-white";
$usuarios_opc = "text-white";
switch ($sidebar_op) {
  case 1:
    $prestamos_opc = "active";
    break;
  case 2:
    $libros_opc = "active";;
    break;
  case 3:
    $usuarios_opc = "active";
    break;
}

?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-4">Biblioteca</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link <?=$prestamos_opc?>" aria-current="page">
              Préstamos
          </a>
        </li>
        <li>
          <a href="libros.php" class="nav-link <?=$libros_opc?>">
              Libros
          </a>
        </li>
        <li>
          <a href="usuarios.php" class="nav-link <?=$usuarios_opc?>">
              Usuarios
          </a>
        </li>
      </ul>


      <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
          <li><a class="dropdown-item" href="#">New project...</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
      </div>


</div>

