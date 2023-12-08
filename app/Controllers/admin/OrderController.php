<?php

namespace app\Controllers\admin;

use app\App;
use app\ViewModels\OrderVM;
use core\Controller;
use core\Common;
use Exception;

class OrderController extends Controller
{
    function __construct()
    {
        if (isset($_SESSION["admin"]) == false) {
            Common::ToUrl("/admin/login");
        }
        $this->setLayout("app/Views/layouts/_adminLayout.php");
        $this->setTitle("Quản lý đơn hàng");
    }
    public function index()
    {
        $this->View();
    }
    public function add()
    {
    }
    public function detail()
    {
        $this->View();
    }
    public function delete()
    {
    }
}
