<?php

namespace app\Controllers;

use core\Controller;

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
        $this->View();
    }
}
