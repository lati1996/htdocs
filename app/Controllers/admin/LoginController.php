<?php

namespace app\Controllers\admin;

use app\Models\AdminModel;
use core\Common;
use core\Controller;

class LoginController extends Controller
{
    public $modelDB;
    function __construct()
    {
        if (isset($_SESSION["admin"])) {
            Common::ToUrl("admin/login");
        }
        $this->modelDB = new AdminModel();
        $this->setTitle("Đăng nhập quản lý HT Shop");
    }
    public function index()
    {
        if (isset($_POST["btnLogin"])) {
            // đã gửi thông tin đăng nhập
            $user = $_POST["user"];
            //var_dump($user);
            $username = $user["username"];
            $password = sha1($user["password"]);
            $userDB = $this->modelDB->CheckLogin($username, $password);
            if ($userDB) {
                $_SESSION["admin"] = $userDB;
                Common::ToUrl("/admin/dashboard");
                exit();
            }
        }
        $this->View();
    }
}
