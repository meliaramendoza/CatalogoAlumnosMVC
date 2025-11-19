<?php
$route = $_GET['route'] ?? 'home/index';
list($controller, $method) = explode('/', $route);

$controller = ucfirst(strtolower($controller)) . 'Controller';
$controllerFile = "app/controllers/$controller.php";

if (!file_exists($controllerFile)) {
    die("Controlador no encontrado: $controllerFile");
}

require_once $controllerFile;

if (!class_exists($controller)) {
    die("Clase $controller no encontrada.");
}

$controllerInstance = new $controller;

if (!method_exists($controllerInstance, $method)) {
    die("Método $method no encontrado en $controller.");
}

$controllerInstance->$method();
