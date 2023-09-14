<?php

namespace app\Controllers;

use core\Controller;

class SigninController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setLayout("app/Views/layouts/_Layout.php");
        $this->setTitle("Đăng nhập htT Store");
    }
    public function index()
    {
        $this->View();
    }
}
