<div class="container my-5">
  <!-- Encabezado y botón para agregar un nuevo curso -->
  <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">Cursos</h2>
      <a href="?route=course/create" class="btn btn-success">➕ Agregar Curso</a>
  </div>

  <!-- Fila que contendrá las tarjetas de cada curso -->
  <div class="row">
    <?php foreach ($courses as $course): ?>
      <div class="col-md-4 mb-4">
        <!-- Tarjeta individual de un curso -->
        <div class="card shadow-lg border-0">
          <div class="card-body">

            <!-- Título del curso con enlace a la lista de estudiantes -->
            <h4 class="card-title fw-bold">
              <a href="?route=course/studentsByCourse&id=<?= $course['id'] ?>" class="text-decoration-none">
                <?= htmlspecialchars($course['name']); ?>
              </a>
            </h4>

            <!-- Descripción del curso -->
            <p><?= htmlspecialchars($course['description']); ?></p>

            <!-- Botón para eliminar el curso, con confirmación -->
            <div class="text-end">
              <a onclick="return confirm('¿Seguro de eliminar?')"
                 href="?route=course/delete&id=<?= $course['id'] ?>"
                 class="btn btn-danger btn-sm">🗑️ Eliminar</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>