<?php

namespace app\Controllers;

use core\Controller;

class AboutController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setLayout("app/Views/layouts/_Layout.php");
        $this->setTitle("Giới thiệu về Drap gối Hoàng Tuấn");
    }
    public function index()
    {
        $this->View();
    }
}
