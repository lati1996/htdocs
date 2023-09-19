<?php

namespace app;

use core\Route;

require_once 'configs/routes.php';
class App
{
    public static $__module, $__controller, $__action, $__params,  $__routes, $app;
    function __construct()
    {
        global $routes;
        self::$app = $this;
        self::$__routes = new Route();
        if (!empty($routes['default_controller'])) {
            self::$__controller = $routes['default_controller'];
        }
        self::$__action = 'index';
        self::$__params = [];
        $this->handleUrl();
    }
    function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }
    public function handleUrl()
    {
        $url = $this->getUrl();
        $url = self::$__routes->handleRoute($url);
        $urlArr = array_filter(explode('/', $url)); //đưa url vào mảng
        $urlArr = array_values($urlArr); //đánh số thứ tự
        $urlCheck = '';


        if (!empty($urlArr)) {
            foreach ($urlArr as $key => $item) {
                $urlCheck .= $item . '/';
                $fileCheck = rtrim($urlCheck, '/');
                $fileArr = explode('/', $fileCheck);
                $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);
                $fileCheck = implode('/', $fileArr);
                if (!empty($urlArr[$key - 1])) {
                    self::$__module = $urlArr[$key - 1];
                    unset($urlArr[$key - 1]);
                }
                if (file_exists('app/Controllers/' . ($fileCheck) . 'Controller.php')) {
                    $urlCheck = $fileCheck;
                    break;
                }
            }
            $urlArr = array_values($urlArr);
        }
        //xử lý controller
        if (!empty($urlArr[0])) {
            self::$__controller = ucfirst($urlArr[0]);
        } else {
            self::$__controller = ucfirst(self::$__controller);
        }
        //echo $fileCheck;
        if (!empty($fileCheck)) {
            if (file_exists('app/Controllers/' . ($fileCheck) . 'Controller.php')) {
                unset($urlArr[0]); //nhả url [0]
            } else {
                $data['mess'] = 'controller file check...';
                App::loadError('404', $data);
            }
        }
        //xử lý action
        if (!empty($urlArr[1])) {
            self::$__action = $urlArr[1];
            unset($urlArr[1]);
        }
        //xử lý params
        self::$__params = array_values($urlArr);
        self::$__controller = self::$__controller . 'Controller';
    }
    public static function loadError($name = '404', $data = [])
    {
        extract($data);
        require_once 'Views/errors/' . $name . '.php';
    }
}
