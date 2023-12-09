<?php

namespace app\Controllers\admin;

use app\App;
use app\ViewModels\UserVM;
use core\Controller;
use core\Common;
use Exception;

class UserController extends Controller
{
    public $modelDB;
    function __construct()
    {
        if (isset($_SESSION["admin"]) == false) {
            Common::ToUrl("/admin/login");
        }
        $this->setLayout("app/Views/layouts/_adminLayout.php");
        $this->setTitle("Tất cả người dùng");
    }
    public function index()
    {
        $this->View();
    }
    public function add()
    {
        $data = [];
        if (isset($_POST["btnAdd"])) {
            // đã gửi thông tin đăng nhập
            $user = $_POST["user"];
            //var_dump($user);
            if (!empty($user)) {
                if ($user["Password"] == $user["RePassword"]) {
                    unset($user["RePassword"]);
                    //var_dump($user);
                    $user["Password"] = sha1($user["Password"]);
                    $modeldb = new UserVM();
                    try {
                        $modeldb->Post($user);
                        $data["mess"] = "Thêm thành công người dùng";
                    } catch (Exception $ex) {
                        $error =  $ex->getMessage();
                        $data["error"] = $error;
                    }
                }
            }
        }
        $this->View($data);
    }
    public function edit()
    {
        $data = [];
        if (isset($_POST["btnEdit"])) {
            // đã gửi thông tin đăng nhập
            $user = $_POST["user"];
            if (!empty($user)) {
                if ($user["Password"] == $user["RePassword"]) {
                    unset($user["RePassword"]);
                    $user["Password"] = sha1($user["Password"]);
                    try {
                        $modeldb = new UserVM();
                        $modeldb->Put($user);
                        $data["mess"] = "Cập nhật thành công thông tin người dùng";
                    } catch (Exception $ex) {
                        $error =  $ex->getMessage();
                        $data["error"] = $error;
                    }
                }
            }
        }
        $this->View($data);
    }
    public function delete()
    {
        $id = App::$__params[0];
        $modeldb = new UserVM();
        try {
            $modeldb->Delete($id);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
