<?php

namespace app\Controllers\admin;

use app\App;
use app\ViewModels\ProductVM;
use core\Controller;
use core\Common;
use Exception;

class ProductController extends Controller
{
    function __construct()
    {
        if (isset($_SESSION["admin"]) == false) {
            Common::ToUrl("/admin/login");
        }
        $this->setLayout("app/Views/layouts/_adminLayout.php");
        $this->setTitle("Tất cả Sản phẩm");
    }
    public function index()
    {
        $this->View();
    }
    public function add()
    {
        $data = [];
        $target_dir = "public/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["btnAdd"])) {
            $product = $_POST["product"];
            // đã gửi thông tin đăng nhập
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if (file_exists($target_file)) {
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $uploadOk = 0;
            }
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
            ) {
                $uploadOk = 0;
            }
            // var_dump($product);
            if (!empty($product)) {
                if ($product["IdCate"] == "0") {
                    $data["mess"] = "Chọn danh mục sản phẩm";
                    $this->View($data);
                } else {
                    $modeldb = new ProductVM();
                    try {
                        if ($uploadOk != 0) {
                            if (is_dir("public/uploads/") == false) {
                                mkdir("public/uploads/", 0777);
                            }
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                $product["Image"] = basename($_FILES["fileToUpload"]["name"]);
                            }
                            $modeldb->Post($product);
                            $data["mess"] = "Thêm sản phẩm thành công";
                            var_dump($uploadOk);
                        }
                    } catch (Exception $ex) {
                        $error = $ex->getMessage();
                        $data["error"] = $error;
                    }
                }
            }
        }

        $this->View($data);
    }
    public function edit()
    {
        $oldProd = new ProductVM(App::$__params[0]);
        $oldImg = $oldProd->Image;
        //echo $oldImg;
        $data = [];
        $target_dir = "public/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 0;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["btnEdit"])) {
            $product = $_POST["product"];
            //var_dump($_FILES["fileToUpload"]["name"]);
            if (!empty($_FILES["fileToUpload"]["name"])) {
                // đã gửi thông tin đăng nhập
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                if (file_exists($target_file)) {
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    $uploadOk = 0;
                }
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
                ) {
                    $uploadOk = 0;
                }
            }
            //var_dump($product);
            if (!empty($product)) {
                if ($product["IdCate"] == "0") {
                    $data["mess"] = "Chọn danh mục sản phẩm";
                    $this->View($data);
                } else {
                    $modeldb = new ProductVM();
                    try {
                        if ($uploadOk != 0) {
                            if (file_exists("public/uploads/" . $oldImg)) {
                                if (unlink("public/uploads/" . $oldImg)) {
                                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                        $product["Image"] = basename($_FILES["fileToUpload"]["name"]);
                                    }
                                }
                            } else {
                                var_dump($product);
                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                    $product["Image"] = basename($_FILES["fileToUpload"]["name"]);
                                }
                            }
                        }
                        $modeldb->Put($product);
                        $data["mess"] = "Cập nhật sản phẩm thành công";
                    } catch (Exception $ex) {
                        echo $ex->getMessage();
                    }
                }
            }
        }
        $this->View($data);
    }
    public function delete()
    {
        $id = App::$__params[0];
        $modeldb = new ProductVM();
        try {
            $modeldb->Delete($id);
            Common::ToUrl("/admin/product");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
