<!-- Barra de navegación principal -->
<nav class="navbar navbar-expand-lg bg-light mb-4">
  <div class="container-fluid">

    <!-- Marca o logo de la aplicación con enlace a la página de inicio -->
    <a class="navbar-brand fs-3 fw-bold text-primary fst-italic" href="?route=home/index">Coursy</a>

    <!-- Botón para mostrar/ocultar el menú en pantallas pequeñas -->
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menú colapsable de navegación -->
    <div class="collapse navbar-collapse" id="menu">

      <!-- Lista de enlaces de navegación principales -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li><a class="nav-link" href="?route=course/index">Cursos</a></li>
        <li><a class="nav-link" href="?route=student/index">Alumnos</a></li>
      </ul>

      <!-- Información del usuario con nombre y foto -->
      <div class="d-flex ms-3 align-items-center">
        <span class="me-2 fw-semibold">Meli Mendoza</span>
        <img src="public/img/fotopersona.jpg" width="44" height="44" class="rounded-circle object-fit-cover">
      </div>

    </div>
  </div>
</nav>