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
        if (isset($_SESSION["admin"]) == false) {
            Common::ToUrl("/admin/login");
        }
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
    public function deleteImg()
    {
        $id = App::$__params[0];
        $modeldb = new ImageVM();
        $data = new ImageVM($id);
        try {
            unlink("public/uploads/bonus/" . $data->Image);
            $modeldb->Delete($id);
            //header("Location: " . $_SERVER['REQUEST_URI']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
