<?php

namespace app\Controllers\admin;

use app\App;
use app\ViewModels\ImageVM;
use app\ViewModels\ProductVM;
use app\ViewModels\SizeVM;
use core\Controller;
use core\Common;
use Exception;

class SizeController extends Controller
{
    function __construct()
    {
        $this->setLayout("app/Views/layouts/_adminLayout.php");
        $this->setTitle("Option & Giá thành sản phẩm");
    }
    public function index()
    {

        $this->View();
    }
    public function add()
    {
        if (isset($_POST["size"])) {
            $size = $_POST["size"];
            $model = new SizeVM();
            try {
                $model->Post($size);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    public function edit()
    {
        if (isset($_POST["size"])) {
            $size = $_POST["size"];
            $model = new SizeVM();
            try {
                $model->Put($size);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    public function delete()
    {
        $id = App::$__params[0];
        $modeldb = new SizeVM();
        try {
            $modeldb->Delete($id);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getPrice()
    {
        $id = App::$__params[0];
        $modeldb = new SizeVM($id);
        echo $modeldb->SizetoPrice();
    }
}
