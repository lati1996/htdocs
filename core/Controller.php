<?php

namespace core;

use app\App;

class Controller extends App
{
    public static $Layout, $Title;
    function __construct()
    {
        parent::__construct();
    }

    public function setLayout($Layoput)
    {
        self::$Layout = $Layoput;
    }
    public function setTitle($title)
    {
        self::$Title = $title;
    }
    public function View($data = [])
    {
        //var_dump($mess);
        extract($data);
        //xác định layout nào
        //file view là file nào 
        $title = self::$Title;
        $_Module = App::$__module;
        $_Controller = App::$__controller;
        $_Controller = str_replace("Controller", "", $_Controller);
        $_Controller = strtolower($_Controller);
        $_Action = App::$__action;
        if (!empty($_Module)) {
            $_Content = "./app/Views/{$_Module}/{$_Controller}/{$_Action}.php";
        } else
            $_Content = "./app/Views/{$_Controller}/{$_Action}.php";
        //$_Params = App::$__params;
        //echo $_Content;
        if (file_exists($_Content) == false) {
            exit("không có file content");
        }
        //cấu hình linh động cho các controller
        $_layout = self::$Layout;
        if ($_layout == null) {
            include $_Content;
        } else {
            include $_layout;
        }
    }
    public function model($model)
    {
        if (file_exists(_DIR_ROOT . '/app/Models/' . $model . '.php')) {
            require_once _DIR_ROOT . '/app/Models/' . $model . '.php';
            if (class_exists($model)) {
                $model = new $model();
                return $model;
            }
        }
        return false;
    }
    public static function render($view, $data = [])
    {
        extract($data);
        if (file_exists(_DIR_ROOT . '/app/Views/' . $view . '.php')) {
            require_once _DIR_ROOT . '/app/Views/' . $view . '.php';
        } else
            App::$app->loadError();
    }
    public static function admin404($mess)
    {
        $data['subcontent']['mess'] = $mess;
        $data['content'] = 'admin/error/404';
        $data['title'] = '404 Page not found';
        Controller::render('layouts/_adminLayout', $data);
    }
}
