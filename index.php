<?php
spl_autoload_register(function (string $className) {
<<<<<<< HEAD
    require_once __DIR__ . '/' . str_replace("\\", "/", $className) . '.php';
});

$route = $_GET['route'] ?? '';
$routes = require __DIR__ . 'routes.php';

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
=======
    require_once __DIR__ . '/' . str_replace("\\","/",$className) . '.php';
});

$author = new \Models\Users\User('anddrey');
$article = new \Models\Articles\Article($author,'qweqwe','safasfasf');
>>>>>>> c1c490f08077a712a6d1d325442dbc91764324a7
