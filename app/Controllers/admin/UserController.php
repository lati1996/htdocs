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
        if (isset($_POST["btnAdd"])) {
            // đã gửi thông tin đăng nhập
            $user = $_POST["user"];
            //var_dump($user);
            if (!empty($user)) {
                if ($user["Password"] == $user["RePassword"]) {
                    unset($user["RePassword"]);
                    //var_dump($user);
                    $modeldb = new UserVM();
                    try {
                        $modeldb->Post($user);
                    } catch (Exception $ex) {
                        echo $ex->getMessage();
                    }
                }
            }
        }
        $this->View();
    }
    public function edit()
    {
        if (isset($_POST["btnEdit"])) {
            // đã gửi thông tin đăng nhập
            $user = $_POST["user"];
            if (!empty($user)) {
                if ($user["Password"] == $user["RePassword"]) {
                    unset($user["RePassword"]);
                    $modeldb = new UserVM();
                    $modeldb->Put($user);
                    Common::ToUrl("/admin/user");
                }
            }
        }
        $this->View();
    }
    public function delete()
    {
        $id = App::$__params[0];
        $modeldb = new UserVM();
        try {
            $modeldb->Delete($id);
            Common::ToUrl("/admin/user");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
