<?php

namespace app\Controllers\admin;

use app\App;
use app\ViewModels\CategoryVM;
use core\Controller;
use core\Common;
use Exception;

class CategoryController extends Controller
{
    function __construct()
    {
        if (isset($_SESSION["admin"]) == false) {
            Common::ToUrl("/admin/login");
        }
        $this->setLayout("app/Views/layouts/_adminLayout.php");
        $this->setTitle("Danh mục Sản phẩm");
    }
    public function index()
    {
        $this->View();
    }
    public function add()
    {
        if (isset($_POST["btnAdd"])) {
            // đã gửi thông tin đăng nhập
            $category = $_POST["category"];
            //var_dump($user);
            if (!empty($category)) {
                $modeldb = new CategoryVM();
                try {
                    $modeldb->Post($category);
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                }
            }
        }
        $this->View();
    }
    public function edit()
    {
        if (isset($_POST["btnEdit"])) {
            // đã gửi thông tin đăng nhập
            $category = $_POST["category"];
            if (!empty($category)) {
                $modeldb = new CategoryVM();
                $modeldb->Put($category);
                Common::ToUrl("/admin/category");
            }
        }
        $this->View();
    }
    public function delete()
    {
        $id = App::$__params[0];
        $modeldb = new CategoryVM();
        try {
            $modeldb->Delete($id);
            Common::ToUrl("/admin/category");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
