<?php

class Db {

    private static $instance;

    public static function getConn() {

        if (!isset(self::$instance)):
            self::$instance = new \PDO('mysql:host=localhost;dbname=outdoor_angola;charset=utf8', 'root', '');
        endif;

        return self::$instance;
    }

}
