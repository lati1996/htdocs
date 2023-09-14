<?php

namespace app\Controllers\admin;

use core\Common;
use core\Controller;


class DashboardController extends Controller
{
    public $modelDB;
    function __construct()
    {
        if (isset($_SESSION["admin"]) == false) {
            Common::ToUrl("/admin/login");
        }
        $this->setLayout("app/Views/layouts/_adminLayout.php");
        $this->setTitle("Quản lý HT Shop");
    }
    public function index()
    {
        $this->View();
    }
    public function logout()
    {
        unset($_SESSION["admin"]);
        Common::ToUrl("/admin/login");
    }
}
