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

        $this->View();
    }
    public function add()
    {
        $idProd = App::$__params[0];
        $idUser = $_SESSION["user"]["Id"];
        $cartModel = new CartVM();
        $data["IdUser"] = $idUser;
        $data["IdProd"] = $idProd;
        $data["Quantity"] = 1;
        $cartModel->Post($data);
        Common::ToUrl("/cart");
    }
}
