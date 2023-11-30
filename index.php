<?php

use app\App;
use core\Database;

session_start();
require "./vendor/autoload.php";

define('_DIR_ROOT', __DIR__);
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'] . '/';
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'] . '/';
}
$configs_dir = scandir('configs');
//auto load configs
if (!empty($configs_dir)) {
    foreach ($configs_dir as $item) {
        if ($item != '.' && $item != '..' && file_exists('configs/' . $item)) {
            require_once 'configs/' . $item;
        }
    }
}
//echo $_SERVER['DOCUMENT_ROOT'];
// $folder = basename($_SERVER['DOCUMENT_ROOT']);
//$web_root = $web_root . $folder . $routes['folder-name'];
define('_WEB_ROOT', $web_root); //khai báo đường dẫn thư mục gốc
if (!empty($config['database'])) {
    $db_config = array_filter($config['database']);
}
$db = new Database();
var_dump($db);
$app = new App();
$contl = app::$__controller;
$module = app::$__module;
if (!empty($module)) {
    $ClassName = "app\\Controllers\\{$module}\\{$contl}";
} else {
    $ClassName = "app\\Controllers\\{$contl}";
}

spl_autoload_register(function ($ClassName) {
    include("{$ClassName}.php");
});
$ActionName = app::$__action;
if (file_exists("app/Controllers/" . $contl . ".php") || file_exists("app/Controllers/" . $module . "/" . $contl . ".php")) {
    $Controller = new $ClassName();
    if (method_exists($Controller, $ActionName)) {
        $Controller->$ActionName();
    } else {
        echo "Action failed";
    }
}
