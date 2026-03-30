<?php
define('BASE_PATH', __DIR__);

spl_autoload_register(function ($class) {
    $paths = [
        BASE_PATH . '/app/controllers/' . $class . '.php',
        BASE_PATH . '/app/models/' . $class . '.php'
    ];

    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

$controllerName = ucfirst(strtolower($_GET['controller'] ?? 'home')) . 'Controller';
$action = $_GET['action'] ?? 'index';

if (!class_exists($controllerName)) {
    die("Controller không tồn tại.");
}

$controller = new $controllerName();

if (!method_exists($controller, $action)) {
    die("Action không tồn tại.");
}

$controller->$action();
