<div class="container mt-4">
    <!-- Título de la página -->
    <h2 class="fw-bold mb-3">Nuevo Alumno</h2>

    <!-- Mostrar mensaje de error si existe -->
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <!-- Formulario para agregar un nuevo alumno -->
    <form method="POST" onsubmit="return validateForm()">
        <!-- Campos básicos del alumno -->
        <input type="text" name="ci" id="ci" class="form-control mb-2" placeholder="CI" required>
        <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Nombre completo" required>
        <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Correo electrónico" required>

        <!-- Fecha de nacimiento -->
        <label class="mt-2 fw-bold">Fecha de Nacimiento</label>
        <input type="date" name="birth_date" id="birth_date" class="form-control mb-2" required>

        <!-- Edad calculada automáticamente -->
        <label class="mt-2 fw-bold">Edad (automática)</label>
        <input type="number" name="age" id="age" class="form-control mb-2" readonly>

        <!-- Semestre y materia -->
        <input type="number" name="semester" id="semester" class="form-control mb-3" placeholder="Semestre (1 - 10)" min="1" max="10" required>
        <input type="text" name="materia" id="materia" class="form-control mb-2" placeholder="Materia" required>

        <!-- Botón para guardar el formulario -->
        <button class="btn btn-success w-100">Guardar</button>
    </form>
</div>

<script>
/* -------------------------------------------------------------
   Calcular edad automáticamente cuando cambia la fecha de nacimiento
------------------------------------------------------------- */
document.getElementById("birth_date").addEventListener("change", function () {
    let birthDate = new Date(this.value);
    let today = new Date();

    if (isNaN(birthDate)) return;

    let age = today.getFullYear() - birthDate.getFullYear();
    let monthDiff = today.getMonth() - birthDate.getMonth();

    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    document.getElementById("age").value = age;
});

/* -------------------------------------------------------------
   Validación final del formulario antes de enviarlo
------------------------------------------------------------- */
function validateForm() {
    const semester = parseInt(document.getElementById("semester").value);
    const age = parseInt(document.getElementById("age").value);

    // Verificar que todos los campos obligatorios estén completos
    const fields = ["ci", "name", "email", "birth_date", "semester"];
    for (let field of fields) {
        let value = document.getElementById(field).value.trim();
        if (value === "") {
            alert("⚠️ Por favor complete todos los campos antes de continuar.");
            return false;
        }
    }

    // Validar edad calculada
    if (isNaN(age) || age < 1) {
        alert("⚠️ La fecha de nacimiento no es válida.");
        return false;
    }

    // Validar semestre dentro del rango permitido
    if (semester < 1 || semester > 10) {
        alert("⚠️ El semestre debe estar entre 1 y 10.");
        return false;
    }

    return true;
}
</script>