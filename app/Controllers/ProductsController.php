<?php

namespace app\Controllers;

use core\Common;
use core\Controller;
use app\ViewModels\CartVM;
use app\ViewModels\ProductVM;
use app\App;
use app\ViewModels\CategoryVM;

class ProductsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setLayout("app/Views/layouts/_Layout.php");
        $this->setTitle("Tất cả sản phẩm");
    }
    public function index()
    {
        $this->View();
    }
    public function category()
    {
        $par = App::$__params[0];
        $idCate = str_replace("tag=", "", $par);
        $category = new CategoryVM($idCate);
        $this->setTitle($category->CategoryName);
        $this->View();
    }
    public function detail()
    {
        $idProd = App::$__params[0];
        $idProd = str_replace("product=", "", $idProd);
        $prod = new ProductVM($idProd);
        $this->setTitle($prod->ProductName);
        $data = [];
        if (isset($_POST["btnAddCart"])) {
            if (isset($_SESSION["user"])) {
                $item = $_POST["item"];
                if (empty($item["IdSize"])) {
                    $data["error"] = "Vui lòng chọn kích thước sản phẩm";
                } else {
                    $cartModel = new CartVM();
                    $data["IdUser"] = $_SESSION["user"]["Id"];
                    $data["IdProd"] = $item["Id"];
                    $data["IdSize"] = $item["IdSize"];
                    $data["Status"] = '0';
                    $check = $cartModel->CheckCart($data);
                    if (empty($check)) {
                        $data["Quanity"] = $item["Quanity"];
                        $cartModel->Post($data);
                        unset($_POST["item"]);
                        $data["mess"] = "Đã thêm vào giỏ hàng";
                    } else {
                        $check["Quanity"] += $item["Quanity"];
                        $cartModel->Put($check);
                        unset($_POST["item"]);
                        $data["mess"] = "Đã thêm vào giỏ hàng";
                    }
                }
            } else {
                Common::ToUrl("/signin");
            }
        }
        if (isset($_POST["btnBuy"])) {
            $item = $_POST["item"];
            $cartModel = new CartVM();
            $data["IdUser"] = $_SESSION["user"]["Id"];
            $data["IdProd"] = $item["Id"];
            $data["IdSize"] = $item["IdSize"];
            $data["Status"] = '0';
            $check = $cartModel->CheckCart($data);
            if (empty($check)) {
                $data["Quanity"] =  $item["Quanity"];
                $cartModel->Post($data);
                unset($_POST["item"]);
                Common::ToUrl("/Cart");
            } else {
                $check["Quanity"] += $item["Quanity"];
                $cartModel->Put($check);
                unset($_POST["item"]);
                Common::ToUrl("/Cart");
            }
        }
        $this->View($data);
    }
}
