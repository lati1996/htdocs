<?php

namespace app\Controllers;

use app\ViewModels\UserVM;
use core\Common;
use core\Controller;
use Exception;

class SignupController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setLayout("app/Views/layouts/_Layout.php");
        $this->setTitle("Đăng ký tài khoản hT Store");
    }
    public function index()
    {
        $data = [];
        if (isset($_POST["btnSignup"])) {
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
                        $data["mess"] = "Đăng ký thành công";
                    } catch (Exception $ex) {
                        $error =  $ex->getMessage();
                        $data["error"] = $error;
                    }
                }
            }
        }
        $this->View($data);
    }
    public function signout()
    {
        unset($_SESSION["user"]);
        unset($_SESSION["payment"]);
        Common::ToUrl("/signin");
    }
}
