<?php

namespace app\Controllers;

use app\App;
use app\ViewModels\CartVM;
use app\ViewModels\OrderVM;
use core\Common;
use core\Controller;
use Exception;

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
            $model = new CartVM();
            $listCart = $model->GetCart($_SESSION["user"]["Id"]);
            if ($listCart) {
                $_SESSION["payment"] = $_POST["payment"];
                $totalItem = 0;
                $idOr = "HT-" . Date("DH-ymdhis", time());
                while ($row = $listCart->fetch_array()) {
                    $item = new CartVM($row);
                    $totalItem += $item->Quanity;
                    $updateCart["Id"] = $item->Id;
                    $updateCart["Status"] = "1";
                    $updateCart["IdOrder"] = $idOr;
                    $modelC = new CartVM();
                    $modelC->Put($updateCart);
                }
                $order["Id"] = $idOr;
                $order["TotalPrice"] = $_SESSION["payment"]["TotalCart"];
                $order["DeliveryAddress"] = $_SESSION["payment"]["DeliveryAddress"];
                $order["PaymentStatus"] = "0";
                $order["TotalItem"] = $totalItem;
                $order["DateCreate"] = Date("Y-m-d H:i:s");
                $order["PaymentMethod"] = $_SESSION["payment"]["PaymentMethod"];
                $modelOrder = new OrderVM();
                $modelOrder->Post($order);
                if ($order["PaymentMethod"] == "0")
                    Common::ToUrl("/cart/payment");
                else
                    Common::ToUrl("/cart/codpayment");
            }
        }
        $this->View();
    }
    public function add()
    {
        if (isset($_GET["proid"]) && isset($_GET["qua"])) {
            $idProd = $_GET["proid"];
            $idUser = $_SESSION["user"]["Id"];
            $cartModel = new CartVM();
            $data["IdUser"] = $idUser;
            $data["IdProd"] = $idProd;
            $data["Status"] = '0';
            $check = $cartModel->CheckCart($data);
            //var_dump($check);
            if (empty($check)) {
                $data["Quanity"] = $_GET["qua"];
                $cartModel->Post($data);
            } else {
                $check["Quanity"] += $_GET["qua"];
                $cartModel->Put($check);
                //Common::ToUrl($_SERVER["HTTP_REFERER"]);
            }
        }
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
    public function codpayment()
    {
        $this->setTitle("Thanh toán đơn hàng - hT Store");
        $this->View();
    }
}
