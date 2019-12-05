<?php


namespace components;


class Router {

    private $routes;

    public function __construct() {
        //Получили роуты в перменную класса $routes
        $this->routes = require_once ("config/routes.php");
    }

    //Данная функция запускает роутер
    public function run() {
        $uri = $this->filter(); //В $uri хранится обрезанный REQUEST_URI
        $this->controllerRun($uri); //Запускает нужный контроллер
    }

    //Функция обрезает в REQUEST_URI слэши в начале и конце
    private function filter() {
        return trim($_SERVER['REQUEST_URI'], "/");
    }

    //Если REQUEST_URI не совпал с роутом, то выводит 404
    private function err404() {
        echo "404";
        die();
    }

    //Проверяет существует ли контроллер, создает и запускает его, если существует, иначе 404
    //Улучшить можно при помощи регулярных выражений и call_user_func
    private function controllerRun($uri) {
        foreach ($this->routes as $uriPattern => $controller_action) {
            if (preg_match("~$uriPattern~", $uri)) {
                $controller_action_arr = explode("/", $controller_action);

                //Указываем app\controllers\, т.к. иначе будет ошибка
                $controllerName = "app\\controllers\\$controller_action_arr[0]";
                $actionName = $controller_action_arr[1];

                $controller = new $controllerName();
                $controller->$actionName();

                die();
            }
        }
        $this->err404();
    }
}