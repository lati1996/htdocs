<?php

namespace app\Controllers\admin;

use app\App;
use app\ViewModels\MenuItemVM;
use app\ViewModels\MenuVM;
use core\Controller;
use core\Common;
use Exception;

class MenuController extends Controller
{
    function __construct()
    {
        if (isset($_SESSION["admin"]) == false) {
            Common::ToUrl("/admin/login");
        }
        $this->setLayout("app/Views/layouts/_adminLayout.php");
        $this->setTitle("Điều chỉnh Menu");
    }
    public function index()
    {
        $this->View();
    }
    public function menuitem()
    {
        $this->View();
    }
    public function add()
    {
        $data = [];
        $uploadOk = 0;
        if (isset($_POST["btnAdd"])) {
            if (!empty($_FILES["fileToUpload"]["name"])) {
                $target_dir = "public/uploads/carousel/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                if (getimagesize($_FILES["fileToUpload"]["tmp_name"]) != false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                if ($_FILES["fileToUpload"]["size"] > 5000000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "svg") {
                    $uploadOk = 0;
                }
            }
            // đã gửi thông tin đăng nhập
            $item = $_POST["item"];
            //var_dump($user);
            if (!empty($item)) {
                $modeldb = new MenuItemVM();
                try {
                    if ($uploadOk != 0) {
                        if (is_dir("public/uploads/carousel/") == false) {
                            mkdir("public/uploads/carousel/", 0777);
                        }
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            $item["Icon"] = basename($_FILES["fileToUpload"]["name"]);
                        }
                    }
                    $modeldb->Post($item);
                    $data["mess"] = "Thêm thành công";
                } catch (Exception $ex) {
                    $e = $ex->getMessage();
                    $data["error"] = "Không thành công, liện hệ Hoàng" . $e;
                }
            }
        }
        $this->View($data);
    }
    public function edit()
    {
        $oldProd = new MenuItemVM(App::$__params[0]);
        $oldImg = $oldProd->Icon;
        $data = [];
        $uploadOk = 0;
        $target_dir = "public/uploads/carousel/";
        $target_file = "";
        if (!empty($_FILES["fileToUpload"]["name"])) {
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $uploadOk = 1;
            if (!empty($_FILES["fileToUpload"]["name"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check != false) {
                    $uploadOk = 1;
                }
                if ($_FILES["fileToUpload"]["size"] > 5000000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "svg") {
                    $uploadOk = 0;
                }
            }
        }
        // var_dump($_FILES["fileToUpload"]["name"]);
        // var_dump($uploadOk);
        if (isset($_POST["btnEdit"])) {
            $item = $_POST["item"];
            if (!empty($item)) {
                $modeldb = new MenuItemVM();
                try {
                    if ($uploadOk != 0) {
                        if ($oldImg != "") {
                            if (file_exists("public/uploads/carousel/" . $oldImg)) {
                                if (unlink("public/uploads/carousel/" . $oldImg)) {
                                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                        $item["Icon"] = basename($_FILES["fileToUpload"]["name"]);
                                    }
                                }
                            } else {
                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                    $item["Icon"] = basename($_FILES["fileToUpload"]["name"]);
                                }
                            }
                        } else {

                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                $item["Icon"] = basename($_FILES["fileToUpload"]["name"]);
                            }
                        }
                    }
                    $modeldb->Put($item);
                    //var_dump($uploadOk);
                    //var_dump($item);
                    $data["mess"] = "Cập nhật thành công";
                } catch (Exception $e) {
                    $data["error"] = "Cập nhật thất bại" . $e;
                }
            }
        }
        $this->View($data);
    }
    public function delete()
    {
        $id = App::$__params[0];
        $modeldb = new MenuItemVM();
        try {
            $modeldb->Delete($id);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    public function GetOrderNum()
    {
        $id = App::$__params[0];
        $modeldb = new MenuItemVM();
        $num = $modeldb->GetByQuery("SELECT MAX(`OrderNum`) FROM `tbl_menuitem` WHERE `IdGroup` = " . $id)->fetch_assoc();
        $order = $num["MAX(`OrderNum`)"];
        echo $order + 1;
    }
}
