<div class="container mt-4">
  <!-- Título de la página -->
  <h2>Nuevo Curso</h2>

  <!-- Formulario para crear un nuevo curso -->
  <form method="POST">
    
    <!-- Campo de texto para el nombre del curso (obligatorio) -->
    <input type="text" name="name" class="form-control mb-2" placeholder="Nombre del curso" required>
    
    <!-- Área de texto para la descripción del curso (opcional) -->
    <textarea name="description" class="form-control mb-2" placeholder="Descripción"></textarea>
    
    <!-- Botón para enviar el formulario y guardar el curso -->
    <button class="btn btn-success">Guardar</button>
  </form>
</div>