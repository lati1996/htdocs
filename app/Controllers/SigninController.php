<?php

namespace app\Controllers;

use app\ViewModels\UserVM;
use core\Common;
use core\Controller;

class SigninController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setLayout("app/Views/layouts/_Layout.php");
        $this->setTitle("Đăng nhập hT Store");
    }
    public function index()
    {
        if (isset($_POST["btnSignin"])) {
            $user = $_POST["user"];
            //var_dump($user);
            $acc = $user["Email"];
            $pass = sha1($user["Password"]);
            $model = new UserVM();
            $result = $model->Login($acc, $pass);
            if (!empty($result)) {
                $_SESSION["user"] = $result;
                Common::ToUrl("/home");
                exit();
            }
        }
        $this->View();
    }
    public function signout()
    {
        unset($_SESSION["user"]);
        unset($_SESSION["payment"]);
        Common::ToUrl("/signin");
    }
}
