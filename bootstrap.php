<?php
define('_DIR_ROOT', __DIR__);
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'] . '/';
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'] . '/';
}
// echo $_SERVER['DOCUMENT_ROOT'];
// echo '<br/>';
// echo _DIR_ROOT;
// echo '<br/>';
$configs_dir = scandir('configs');
if (!empty($configs_dir)) {
    foreach ($configs_dir as $item) {
        if ($item != '.' && $item != '..' && file_exists('configs/' . $item)) {
            require_once 'configs/' . $item;
        }
    }
}

$folder = basename($_SERVER['DOCUMENT_ROOT']);
//echo $folder;
$web_root = $web_root . $folder . $routes['folder-name'];
define('_WEB_ROOT', $web_root); //khai báo đường dẫn thư mục gốc
//auto load configs

require_once 'core/Route.php';
require_once 'app/App.php';
//kiem da config database
if (!empty($config['database'])) {
    $db_config = array_filter($config['database']);
    if (!empty($db_config)) {
        //require_once 'core/Connection.php';
        require_once 'core/Database.php';
    }
}
require_once 'core/Model.php';
require_once 'core/Controller.php';
require_once 'core/Common.php';
