<?php

namespace App\Services;

use App\Controllers\ErrorController;
use App\Controllers\IndexController;
use App\Models\Conference;

class Router
{
    private static $list = [];

    public static function get(string $uri, $controller, string $method, $model = null)
    {
        self::$list[] = [
            'uri' => $uri,
            'class' => $controller,
            'method' => $method,
            'model' => $model
        ];
    }

    public static function post(string $uri, $controller, string $method, $model, $formdata = false, $files = false)
    {
        self::$list[] = [
            'uri' => $uri,
            'class' => $controller,
            'method' => $method,
            'post' => true,
            'model' => $model,
            'formdata' => $formdata,
            'files' => $files
        ];
    }

    public static function enable()
    {

        $controller = isset($_GET['controller']) ? $_GET['controller'] : null;
        $method = isset($_GET['method']) ? '/' . $_GET['method'] : null;
        $path = "/{$controller}{$method}";

        foreach (self::$list as $route) {
            if ($route['uri'] === $path) {
                $class = new $route['class'];
                $action = $route['method'];
                if ($route['post']) {
                    $model = new $route['model'];
                    if ($route['formdata'] && $route['files']) {
                        $class->$action($model, $_POST, $_FILES);
                    } else if ($route['formdata']) {
                        $class->$action($model, $_POST);
                    } else {
                        $class->$action($model);
                    }
                } else {
                    if($route['model']) {
                        $model = new $route['model'];
                        $class->$action($model);
                    } else {
                        $class->$action();
                    }
                }

                die();
            }
        }

        $class = new ErrorController();
        $class->index();
    }
}