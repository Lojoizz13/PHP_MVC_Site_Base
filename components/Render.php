<?php


namespace components;


class Render {

    public function render($viewName) {
        require_once ("public/layouts/topHtml.php"); //Вверх HTML
        require_once ("app/views/$viewName.php"); //Уникальный контент
        require_once ("public/layouts/bottomHtml.php"); //Низ HTML
    }
}