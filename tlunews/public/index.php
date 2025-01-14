<?php
require_once '../app/config/config.php';
require '../app/config/database.php';

$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Home';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerPath = "../app/controllers/{$controller}Controller.php";


if (file_exists($controllerPath)) {
    require $controllerPath;
    $controllerClass = $controller . 'Controller';
    $controllerObject = new $controllerClass();


    if (method_exists($controllerObject, $action)) {
        $controllerObject->$action();
    } else {

        echo "404 Not Found: The action does not exist.";
    }
} else {
    echo "404 Not Found: The controller does not exist.";
}
