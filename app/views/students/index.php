<div class="container my-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">Alumnos</h2>
      <a href="?route=student/create" class="btn btn-success">➕ Nuevo Alumno</a>
  </div>

  <table class="table table-striped table-hover shadow-sm text-center">
    <thead class="table-primary">
      <tr>
        <th>ID</th>
        <th>CI</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Fecha de Nacimiento</th>
        <th>Edad</th>
        <th>Semestre</th>
        <th>Materia</th>
        <th>Acción</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($students as $s): ?>
        <tr>
          <td><?= $s['id'] ?></td>
          <td><?= htmlspecialchars($s['ci'] ?? '') ?></td>
          <td><?= htmlspecialchars($s['name'] ?? '') ?></td>
          <td><?= htmlspecialchars($s['email'] ?? '') ?></td>
          <td><?= htmlspecialchars($s['birth_date'] ?? '') ?></td>
          <td><?= htmlspecialchars($s['age'] ?? '') ?></td>
          <td><?= htmlspecialchars($s['semester'] ?? '') ?></td>
          <td><?= htmlspecialchars($s['materia'] ?? '') ?></td>
          <td>
            <a onclick="return confirm('¿Eliminar alumno?')"
               href="?route=student/delete&id=<?= $s['id'] ?>"
               class="btn btn-danger btn-sm">🗑️</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
</div>