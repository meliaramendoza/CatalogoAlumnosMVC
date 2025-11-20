# 📘 Coursy  
Sistema de Gestión de Cursos y Alumnos – MVC en PHP

---

## 📝 Descripción

**Coursy** es una aplicación web desarrollada con el patrón **MVC en PHP** que permite gestionar cursos y alumnos de forma sencilla.  
Incluye funcionalidades como:

- Registro de cursos.
- Registro de alumnos.
- Listado general de alumnos y cursos.
- Filtrado de alumnos por materia/curso.
- Eliminación de alumnos y cursos.
- Validación de formularios.
- Interfaz diseñada con Bootstrap.

El sistema está orientado a prácticas académicas de programación web, arquitectura MVC y manejo de bases de datos MySQL.

---

## 🏗️ Tecnologías Utilizadas

### 🖥️ Backend
- **PHP 8+**
- **MySQL**
- **PDO** para conexión segura a la base de datos
- **Patrón MVC (Model–View–Controller)**

### 🎨 Frontend
- **HTML5**
- **CSS3**
- **Bootstrap 5.3**
- **JavaScript (validaciones y scripts)**

### ⚙️ Infraestructura y herramientas
- **WAMP / XAMPP** (entorno local)
- **VS Code**
- **Git / GitHub**

---

## 📂 Estructura del Proyecto

app/
├── config/
│ └── config.php
├── controllers/
│ ├── CourseController.php
│ ├── HomeController.php
│ └── StudentController.php
├── models/
│ ├── BaseModel.php
│ ├── CourseModel.php
│ └── StudentModel.php
└── views/
├── courses/
├── home/
├── partials/
└── students/

public/
├── css/
├── icono/
├── img/
└── js/

index.php

---

## 📦 Base de Datos

El sistema utiliza dos tablas principales:

### Tablas **courses y students**

```sql
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    duration VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🧩 Funcionalidades Principales

| Módulo   | Acciones Disponibles           |
|----------|--------------------------------|
| Cursos   | Crear, listar, eliminar        |
| Alumnos  | Crear, listar, eliminar        |
| Relación | Ver alumnos por curso          |

---

## ▶️ Ejecución del Proyecto


1. Clonar el repositorio

git clone https://github.com/usuario/coursy.git



2. Colocar el proyecto dentro de:

C:\wamp64\www\


o

C:\xampp\htdocs\



3. Crear la base de datos en phpMyAdmin e importar las tablas.


4. Configurar la conexión en:

app/config/config.php



5. Abrir en el navegador:

http://localhost/coursy/

---

## 👩‍💻 Autor

Melissa Mendoza
Proyecto académico de práctica MVC en PHP.