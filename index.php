<?php
$controller = $_GET['controller'] ?? 'Default';
$action = $_GET['action'] ?? 'index';

//echo "Controller: $controller";
//echo "Action: $action";

$controller = ucfirst(strtolower($controller)) . 'Controller';

$controllerFile = __DIR__ . "app/controllers/$controller.php";
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerInstance = new $controller();

    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        echo "Action '$action' not found!";
    }
} else {
    echo "Controller '$controller' not found!";
}