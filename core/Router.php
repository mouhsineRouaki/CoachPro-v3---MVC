<?php
session_start();
require_once __DIR__. "../../vendor/autoloadRepository.php";
require_once __DIR__. "../../vendor/autoloadModel.php";

class Router
{
    public function handleRequest()
    {
        require_once __DIR__ . '/../routes/web.php';
        
        $url = $_GET['url'] ?? '/';

        if (!isset($routes[$url])) {
            die('404 - Page not found');
        }
        [$controller, $method] = $routes[$url];
        require_once __DIR__ . "/../app/Controllers/$controller.php";
        
        $controllerInstance = new $controller();
        $controllerInstance->$method();
    }
}
