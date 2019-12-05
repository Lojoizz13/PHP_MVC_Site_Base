<?php


namespace app\controllers;

use components\Render;

class MainController {

    //$render - объект, имеет метод render(), который отображает страницу
    private $render;

    public function __construct() {
        $this->render = new Render();
    }

    //Экшн, который отображает главную страницу
    public function index() {
        $this->render->render("IndexView");
    }
}