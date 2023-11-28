<?php

namespace app\Controllers;

use app\ViewModels\UserVM;
use core\Common;
use core\Controller;
use Exception;
use app\App;

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
                        $checkPhone = count($modeldb->CheckInfo($user["Phone"])->fetch_all());
                        $checkAcc = count($modeldb->CheckInfo($user["Account"])->fetch_all());
                        if ($checkAcc == 0 && $checkPhone == 0) {
                            $modeldb->Post($user);
                            $data["mess"] = "Đăng ký thành công";
                        } else {
                            $data["error"] = "Vui lòng kiểm tra lại thông tin!";
                        }
                    } catch (Exception $ex) {
                        $error =  $ex->getMessage();
                        $data["error"] = "Vui lòng kiểm tra lại thông tin!";
                    }
                } else {
                    $data["error"] = "Mật khẩu không trùng khớp, vui lòng thử lại!";
                }
            }
        }
        $this->View($data);
    }
    public function checkinfo()
    {
        $modeldb = new UserVM();
        $info = App::$__params[0];
        //var_dump($info);
        $result = count($modeldb->CheckInfo($info)->fetch_all());
        if ($result != 0) {
            echo "Đã có người sử dụng";
        }
    }
}
