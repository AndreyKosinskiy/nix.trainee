<?php


require "./controllers/ControllerMain.php";
require "./controllers/ControllerList.php";
require "./controllers/ControllerProfile.php";

class Route
{
    static function start()
    {
        $controller = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        // get uri how array 0/1/2
        if (!empty($routes[1])) {
            // controller class
            $controller_name = $routes[1];
        }
        if (!empty($routes[2])) {
            // method in controller class
            $action_name = $routes[2];
        }
        if (!empty($routes[3])) {
            // method in controller class
            $id = $routes[3];
        } else {
            $id = null;
        }

        //get class and methods name
        $model_name = "Model" . ucfirst($controller_name);
        $controller_name = "Controller" . ucfirst($controller_name);
        $action_name = 'action_' . $action_name;

        try {
            $controller = new $controller_name();
        } catch (Exception $e) {
            Route::ErrorPage404();
        }

        $action = $action_name;
        if (method_exists($controller, $action)) {
            $id ? $controller->$action($id) : $controller->$action();
        } else {
            Route::ErrorPage404();
        }
    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header(
            'HTTP/1.1 404 Not Found'
        );
        header(
            'Status: 404 Not Found'
        );
        header('Location ' . $host . '404');
    }
}