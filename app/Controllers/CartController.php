<?php

namespace app\Controllers;

use app\App;
use app\ViewModels\CartVM;
use core\Common;
use core\Controller;

class CartController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (isset($_SESSION["user"]) == false) {
            Common::ToUrl("/signin");
        }
        $this->setLayout("app/Views/layouts/_Layout.php");
        $this->setTitle("Giỏ hàng của bạn - hT Store");
    }
    public function index()
    {
        if (isset($_POST["btnConfirm"])) {
            $_SESSION["payment"] = $_POST["payment"];
            $model = new CartVM();
            $listCart = $model->GetCart($_SESSION["user"]["Id"])->fetch_array();
            $totalItem = 0;
            while ($row = $listCart) {
                $item = new CartVM($row);
                $totalItem = $item->Quanity;
            }
            echo $totalItem;
            //array_sum($listCart["Quanity"]);
            var_dump($listCart);
            $order["Id"] = "HT-" . Date("DH-ymdhis", time());
            $order["TotalPrice"] = $_SESSION["payment"]["TotalCart"];
            $order["DeliveryAddress"] = $_SESSION["payment"]["DeliveryAddress"];
            $order["PaymentStatus"] = "0";

            //Common::ToUrl("/cart/payment");
        }
        $this->View();
    }
    public function add()
    {
        $idProd = App::$__params[0];
        $idUser = $_SESSION["user"]["Id"];
        $cartModel = new CartVM();
        $data["IdUser"] = $idUser;
        $data["IdProd"] = $idProd;
        $check = $cartModel->CheckProd($data);
        //var_dump($check);
        if (empty($check)) {
            $data["Quanity"] = 1;
            $data["Status"] = 0;
            $cartModel->Post($data);
        } else {
            $check["Quanity"] += 1;
            $cartModel->Put($check);
        }
        Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }
    public function plus()
    {
        $id = App::$__params[0];
        $cartNow = new CartVM($id);
        $cartNow->Quanity += 1;
        $data["Id"] = $cartNow->Id;
        $data["IdUser"] = $cartNow->IdUser;
        $data["IdProd"] = $cartNow->IdProd;
        $data["Quanity"] = $cartNow->Quanity;
        $cartModel = new CartVM();
        $cartModel->Put($data);
        Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }
    public function minus()
    {
        $id = App::$__params[0];
        $cartNow = new CartVM($id);
        $cartNow->Quanity -= 1;
        $cartNow->Quanity = max(1, $cartNow->Quanity);
        $data["Id"] = $cartNow->Id;
        $data["IdUser"] = $cartNow->IdUser;
        $data["IdProd"] = $cartNow->IdProd;
        $data["Quanity"] = $cartNow->Quanity;
        $cartModel = new CartVM();
        $cartModel->Put($data);
        Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }
    public function delete()
    {
        $id = App::$__params[0];
        $cartModel = new CartVM();
        $cartModel->Delete($id);
        Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }
    public function payment()
    {
        $this->setTitle("Thanh toán đơn hàng - hT Store");
        $this->View();
    }
}
