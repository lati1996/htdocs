<?php

namespace app\Controllers;

use core\Controller;

class HomeController extends Controller
{
    public $data = [];
    public $modelDB;
    public function __construct()
    {
        parent::__construct();
        $this->setLayout("app/Views/layouts/_Layout.php");
        $this->setTitle("hT Store - Chăn drap gối nệm");
    }
    public function index()
    {
        $this->View();
    }
}
