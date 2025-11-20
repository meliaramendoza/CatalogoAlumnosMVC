<?php
// Obtiene la ruta desde la URL, por defecto 'home/index' si no se proporciona
$route = $_GET['route'] ?? 'home/index';

// Separa la ruta en controlador y método
list($controller, $method) = explode('/', $route);

// Formatea el nombre del controlador, por ejemplo 'home' -> 'HomeController'
$controller = ucfirst(strtolower($controller)) . 'Controller';

// Construye la ruta del archivo del controlador
$controllerFile = "app/controllers/$controller.php";

// Verifica que el archivo del controlador exista
if (!file_exists($controllerFile)) {
    die("Controlador no encontrado: $controllerFile");
}

// Incluye el archivo del controlador
require_once $controllerFile;

// Verifica que la clase del controlador exista
if (!class_exists($controller)) {
    die("Clase $controller no encontrada.");
}

// Crea una instancia del controlador
$controllerInstance = new $controller;

// Verifica que el método exista en el controlador
if (!method_exists($controllerInstance, $method)) {
    die("Método $method no encontrado en $controller.");
}

// Llama al método solicitado del controlador
$controllerInstance->$method();