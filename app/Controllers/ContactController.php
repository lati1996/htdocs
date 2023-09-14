<?php

namespace app\Controllers;

use core\Controller;

class ContactController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setLayout("app/Views/layouts/_Layout.php");
        $this->setTitle("Liên hệ với chúng tôi");
    }
    public function index()
    {
        $this->View();
    }
}
