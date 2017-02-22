<?php

// создаем маршрутизатор

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }


    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        //Получаем строку зпроса
        $uri = $this->getURI();

        //Проверяем наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            //сравниваем $uriPattern c $uri

            if (preg_match("~$uriPattern~", $uri)) {

                // определяем какой контроллер и экшн обрабатывают запрос
                $segments = explode('/', $path);
                $controllerName = array_shift($segments).'Controller';

                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                //Подключаем файл класса контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';


                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                //Создаем обьект, вызываем экшн
                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();

                if ($result != null) {
                    break;
                }
            }
        }
    }
}