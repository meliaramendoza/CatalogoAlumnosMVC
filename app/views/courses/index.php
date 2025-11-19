<div class="container my-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">Cursos</h2>
      <a href="?route=course/create" class="btn btn-success">➕ Agregar Curso</a>
  </div>

  <div class="row">
    <?php foreach ($courses as $course): ?>
      <div class="col-md-4 mb-4">
        <div class="card shadow-lg border-0">
          <div class="card-body">
          <h4 class="card-title fw-bold">
            <a href="?route=course/studentsByCourse&id=<?= $course['id'] ?>" class="text-decoration-none">
              <?= htmlspecialchars($course['name']); ?>
            </a>
          </h4>
            <p><?= htmlspecialchars($course['description']); ?></p>
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