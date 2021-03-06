<?php

use View\View;
use Exceptions\DbException;

try {
    ini_set('display_errors', 1);
    spl_autoload_register(function (string $className) {
        require_once __DIR__ . '/' . str_replace("\\", "/", $className) . '.php';
    });

    $route = $_GET['route'] ?? '';
    $routes = include 'Routes.php';

    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = !$isRouteFound;
            break;
        }
    }


    if (!$isRouteFound) {
        throw new \Exceptions\NotFoundException();
    }

    unset($matches[0]);

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName(...$matches);
} catch (DbException $e) {
    $view = new View();
    $view->renderHTML('errors/page_500.php', ['error' => $e->getMessage()], 500);
}catch (\Exceptions\NotFoundException $e){
    $view = new View();
    $view->renderHTML('errors/page_404.php', [], 404);
}
