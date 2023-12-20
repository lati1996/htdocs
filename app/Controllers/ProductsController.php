<?php

namespace app\Controllers;

use core\Common;
use core\Controller;
use app\ViewModels\CartVM;

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
        $this->View();
    }
    public function detail()
    {
        $data = [];
        if (isset($_POST["btnAddCart"])) {
            if (isset($_SESSION["user"])) {
                $item = $_POST["item"];
                $idProd = $item["Id"];
                $idUser = $_SESSION["user"]["Id"];
                $cartModel = new CartVM();
                $data["IdUser"] = $idUser;
                $data["IdProd"] = $idProd;
                $data["Status"] = '0';
                $check = $cartModel->CheckCart($data);
                if (empty($check)) {
                    $data["Quanity"] =  $item["Quanity"];
                    $cartModel->Post($data);
                    unset($_POST["item"]);
                    $data["mess"] = "Đã thêm vào giỏ hàng";
                } else {
                    $check["Quanity"] += $item["Quanity"];
                    $cartModel->Put($check);
                    unset($_POST["item"]);
                    $data["mess"] = "Đã thêm vào giỏ hàng";
                }
            } else {
                Common::ToUrl("/signin");
            }
        }
        if (isset($_POST["btnBuy"])) {
            $item = $_POST["item"];
            $idProd = $item["Id"];
            $idUser = $_SESSION["user"]["Id"];
            $cartModel = new CartVM();
            $data["IdUser"] = $idUser;
            $data["IdProd"] = $idProd;
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
