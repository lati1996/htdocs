<?php

namespace app\Controllers\admin;

use app\App;
use app\ViewModels\ImageVM;
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
        if (isset($_POST["btnAdd"])) {
            if (!empty($_FILES["fileToUpload"]["name"])) {
                $target_dir = "public/uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                //var_dump($uploadOk);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check != false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                if ($_FILES["fileToUpload"]["size"] > 5000000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $uploadOk = 0;
                }
            }
            $files = [];
            $total = 0;
            if (isset($_FILES["fileToUploadBonus"]["name"])) {
                $files = array_filter($_FILES['fileToUploadBonus']['name']); //something like that to be used before processing files.
                // Count # of uploaded files in array
                $total = count($_FILES['fileToUploadBonus']['name']);
                // Loop through each file
            }
            $product = $_POST["product"];
            //var_dump($product);
            // đã gửi thông tin đăng nhập
            if (!empty($product)) {
                if ($product["IdCate"] == "" || $product["Unit"] == "") {
                    $data["error"] = "Vui lòng điền đầy đủ thông tin";
                    //$this->View($data);
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
                            $idProd = $modeldb->GetIdbyImg(basename($_FILES["fileToUpload"]["name"]));
                            $modelImg = new ImageVM();
                            for ($i = 0; $i < $total; $i++) {
                                //Get the temp file path
                                $tmpFilePath = $_FILES['fileToUploadBonus']['tmp_name'][$i];
                                //Make sure we have a file path
                                if ($tmpFilePath != "") {
                                    //Setup our new file path
                                    $newFilePath = "public/uploads/bonus/" . $_FILES['fileToUploadBonus']['name'][$i];
                                    //Upload the file into the temp dir
                                    if (is_dir("public/uploads/bonus") == false)
                                        mkdir("public/uploads/bonus", 0777);
                                    if (file_exists($newFilePath))
                                        unlink($newFilePath);
                                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                                        $item["Image"] = basename($_FILES["fileToUploadBonus"]["name"][$i]);
                                        $item["IdProd"] = $idProd;
                                        $modelImg->Post($item);
                                    }
                                }
                            }
                            $data["mess"] = "Thêm sản phẩm thành công";
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
        $uploadOk = 0;
        $target_dir = "public/uploads/";
        $target_file = "";
        if (!empty($_FILES["fileToUpload"]["name"])) {
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (!empty($_FILES["fileToUpload"]["name"])) {
                // đã gửi thông tin đăng nhập
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check != false) {
                    $uploadOk = 1;
                }
                if ($_FILES["fileToUpload"]["size"] > 5000000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $uploadOk = 0;
                }
            }
        }
        $files = [];
        $total = 0;
        if (isset($_FILES["fileToUploadBonus"]["name"])) {
            $files = array_filter($_FILES['fileToUploadBonus']['name']); //something like that to be used before processing files.
            // Count # of uploaded files in array
            $total = count($_FILES['fileToUploadBonus']['name']);
            // Loop through each file
        }
        if (isset($_POST["btnEdit"])) {
            $product = $_POST["product"];
            //var_dump($_FILES["fileToUpload"]["name"]);
            //var_dump($product);
            if (!empty($product)) {
                if ($product["IdCate"] == "" || $product["Unit"] == "") {
                    $data["erorr"] = "Vui lòng điền đầy đủ thông tin";
                    //$this->View($data);
                } else {
                    $modeldb = new ProductVM();
                    try {
                        if ($uploadOk != 0) {
                            if (file_exists("public/uploads/" . $oldImg)) {
                                if (unlink("public/uploads/" . $oldImg)) {
                                    //var_dump($product);
                                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                        $product["Image"] = basename($_FILES["fileToUpload"]["name"]);
                                    }
                                }
                            } else {
                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                    $product["Image"] = basename($_FILES["fileToUpload"]["name"]);
                                }
                            }
                        }
                        $modeldb->Put($product);
                        $idProd = $product["Id"];
                        $modelImg = new ImageVM();
                        for ($i = 0; $i < $total; $i++) {
                            //Get the temp file path
                            $tmpFilePath = $_FILES['fileToUploadBonus']['tmp_name'][$i];
                            //Make sure we have a file path
                            if ($tmpFilePath != "") {
                                //Setup our new file path
                                $newFilePath = "public/uploads/bonus/" . $_FILES['fileToUploadBonus']['name'][$i];
                                //Upload the file into the temp dir
                                if (is_dir("public/uploads/bonus") == false)
                                    mkdir("public/uploads/bonus", 0777);
                                if (file_exists($newFilePath))
                                    unlink($newFilePath);
                                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                                    $item["Image"] = basename($_FILES["fileToUploadBonus"]["name"][$i]);
                                    $item["IdProd"] = $idProd;
                                    $modelImg->Post($item);
                                }
                            }
                        }
                        $data["mess"] = "Cập nhật sản phẩm thành công";
                        // var_dump($uploadOk);
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
        $data = new ProductVM($id);
        $modelImg = new ImageVM();
        try {
            unlink("public/uploads/" . $data->Image);
            $modeldb->Delete($id);
            $modelImg->DeleteByIdProd($id);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    public function deleteImg()
    {
        $id = App::$__params[0];
        $modeldb = new ImageVM();
        $data = new ImageVM($id);
        try {
            unlink("public/uploads/bonus/" . $data->Image);
            $modeldb->Delete($id);
            //header("Location: " . $_SERVER['REQUEST_URI']);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
