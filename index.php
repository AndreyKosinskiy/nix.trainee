<?php
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
    $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
    header('HTTP/1.1 404 Not Found');
    header("Status: 404 Not Found");
    header('Location:' . $host . '404');
    return;
}

unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller -> $actionName(...$matches);