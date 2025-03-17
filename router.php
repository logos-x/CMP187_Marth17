<?php
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|woff|woff2|ttf|svg)$/', $_SERVER["REQUEST_URI"])) {
    return false; // Trả về file tĩnh trực tiếp
}

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$base = "/Mar17th";

$path = str_replace($base, "", $path);
$segments = explode("/", trim($path, "/"));

$controller = !empty($segments[0]) ? ucfirst(strtolower($segments[0])) . 'Controller' : 'DefaultController';
$action = $segments[1] ?? 'index';

$controllerFile = __DIR__ . "/app/controllers/$controller.php";
//echo $controllerFile;
if (file_exists($controllerFile)) {
    require_once $controllerFile;

    if (class_exists($controller)) {
        $controllerInstance = new $controller();

        if (method_exists($controllerInstance, $action)) {
            $params = array_slice(explode('/', $_SERVER['REQUEST_URI']), 3);
            $controllerInstance->$action(...$params);
        } else {
            echo "Action '$action' not found!";
        }
    } else {
        echo "Controller '$controller' not found!";
    }

} else {
    echo "Controller '$controller' not found!";
}

