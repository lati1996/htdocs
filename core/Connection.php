<?php

namespace core;

use Exception;
use mysqli;

class Connection
{
    private static $instance = null;
    public static $con;
    private function __construct($config)

    {
        try {
            // $dns = 'mysql:dbname=' . $config['db'] . ';host=' . $config['host'];
            // $option = [
            //     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            // ];
            // $con = new PDO($dns, $config['user'], isset($config['pass']) ? $config['pass'] : '', $option);
            $con = new mysqli($config['host'], $config['user'], isset($config['pass']) ? $config['pass'] : '', $config['db']);
        } catch (Exception $exception) {
            $mess = $exception->getMessage();
            die($mess);
        }
    }
    public static function getInstance($config)
    {
        if (self::$instance == null) {
            self::$instance = new Connection($config);
        }
        return self::$instance;
    }
}
