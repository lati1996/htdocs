<?php

namespace app\Controller;

use app\App;

class ApiController extends App
{
    public function __construct()
    {
        // cho phép tất cả các domain lấy data từ server khác
        header('Access-Control-Allow-Origin: *');
        // kiểu hiển thị JSON có tiếng việt
        header('Content-Type: application/json; charset=utf-8');
    }
    function plusQuaity()
    {
    }

    // function gettinhthanh()
    // {
    //     $tinhThanh = new TinhThanh();
    //     $danhSachTinhThanh = $tinhThanh->Get();
    //     $a = [];
    //     while ($row = $danhSachTinhThanh->fetch_assoc()) {
    //         $a[] = $row;
    //     }
    //     echo json_encode($a, JSON_UNESCAPED_UNICODE);
    // }
    // function getquanhuyen()
    // {
    //     header('Content-Type: application/html; charset=utf-8');
    //     $tinhThanh = new TinhThanh();
    //     $quanHuyens = $tinhThanh->GetByParent($this->getParams()[0]);
    //     $a = [];
    //     while ($row = $quanHuyens->fetch_assoc()) {
    //         echo "<option value='{$row["Id"]}' >{$row["Name"]}</option>";
    //     }
    // }
}
