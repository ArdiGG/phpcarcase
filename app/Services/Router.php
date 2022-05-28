<?php

namespace App\Services;

use App\Controllers\Controller;
use App\Controllers\ErrorController;
use App\Controllers\IndexController;
use App\Models\Conference;
use App\Models\Model;

class Router
{
    private static $list = [];

    public static function get(string $uri, $controller, string $method, $model = null, $id = false)
    {
        self::$list[] = [
            'uri' => $uri,
            'class' => $controller,
            'method' => $method,
            'model' => $model,
            'id' => $id
        ];
    }

    public static function post(string $uri,  $controller, string $method,  $model, $formdata = false, $files = false)
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

    public static function patch(string $uri,  $controller, string $method,  $model, $formdata = false, $files = false)
    {
        self::$list[] = [
            'uri' => $uri,
            'class' => $controller,
            'method' => $method,
            'patch' => true,
            'model' => $model,
            'formdata' => $formdata,
            'files' => $files
        ];
    }

    public static function delete(string $uri,  $controller, string $method,  $model)
    {
        self::$list[] = [
            'uri' => $uri,
            'class' => $controller,
            'method' => $method,
            'delete' => true,
            'model' => $model,
        ];
    }

    public static function enable()
    {
        $query = isset($_GET['q']) ? explode('/', $_GET['q']) : null;

        $id = -INF;
        $path = '';
        foreach ($query as $part) {
            if (intval($part) != 0) {
                $id = $part;
                $part = 'id';
            }

            $path .= '/' . $part;
        }

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
                } else if ($route['patch']){
                    $model = new $route['model'];
                    if ($route['formdata'] && $route['files']) {
                        $class->$action($model, $id, $_POST, $_FILES);
                    } else if ($route['formdata']) {
                        $class->$action($model, $id, $_POST);
                    } else {
                        $class->$action($model, $id);
                    }
                } else if ($route['delete']){
                    $model = new $route['model'];
                    $class->$action($model, $id);
                } else {
                    if ($route['model']) {
                        $model = new $route['model'];
                        if ($route['id']) {
                            $class->$action($model, $id);
                        } else {
                            $class->$action($model);
                        }
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