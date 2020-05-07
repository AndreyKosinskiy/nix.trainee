<?php
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
    $page404 = include __DIR__ . '/templates/page_404.php';
}

unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller -> $actionName(...$matches);