<?php

namespace app\Controllers;

use app\ViewModels\UserVM;
use core\Common;
use core\Controller;
use Exception;

class AccountController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (isset($_SESSION["user"]) == false) {
            Common::ToUrl("/signin");
        }
        $this->setLayout("app/Views/layouts/_Layout.php");
        $this->setTitle("Thông tin tài khoản - hT Store");
    }
    public function index()
    {
        $data = [];
        if (isset($_POST["btnUpdate"])) {
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
                        //var_dump($user);
                        $modeldb->Put($user);
                        $data["mess"] = "Cập nhật thành công";
                        unset($_SESSION["user"]);
                        $_SESSION["user"] = $user;
                    } catch (Exception $ex) {
                        $error =  $ex->getMessage();
                        $data["error"] = "Xảy ra lỗi....";
                    }
                }
            } else {
                $data["error"] = "Mật khẩu không trùng khớp, vui lòng thử lại!";
            }
        }
        $this->View($data);
    }
}
