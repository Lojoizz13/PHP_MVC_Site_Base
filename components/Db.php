<?php


namespace components;


class Db {

    private static $host = "localhost";
    private static $dbname = "shop1";
    private static $user = "root";
    private static $password = "";

    public static function getConnection() {
        return new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$password);
    }
}