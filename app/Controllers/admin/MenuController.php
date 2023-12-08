<?php

namespace app\Controllers\admin;

use app\App;
use app\ViewModels\MenuItemVM;
use app\ViewModels\MenuVM;
use core\Controller;
use core\Common;
use Exception;

class MenuController extends Controller
{
    function __construct()
    {
        if (isset($_SESSION["admin"]) == false) {
            Common::ToUrl("/admin/login");
        }
        $this->setLayout("app/Views/layouts/_adminLayout.php");
        $this->setTitle("Điều chỉnh Menu");
    }
    public function index()
    {
        $this->View();
    }
    public function menuitem()
    {
        $this->View();
    }
    public function add()
    {
        $data = [];
        if (isset($_POST["btnAdd"])) {
            // đã gửi thông tin đăng nhập
            $item = $_POST["item"];
            //var_dump($user);
            if (!empty($item)) {
                $modeldb = new MenuItemVM();
                try {
                    $modeldb->Post($item);
                    $data["mess"] = "Thêm  thành công";
                } catch (Exception $ex) {
                    $e = $ex->getMessage();
                    $data["error"] = "Không thành công, liện hệ Hoàng" . $e;
                }
            }
        }
        $this->View($data);
    }
    public function edit()
    {
        $data = [];
        if (isset($_POST["btnEdit"])) {
            // đã gửi thông tin đăng nhập
            $item = $_POST["item"];
            if (!empty($item)) {
                $modeldb = new MenuItemVM();
                $modeldb->Put($item);
                Common::ToUrl("/admin/menu");
            }
        }
        $this->View($data);
    }
    public function delete()
    {
        $id = App::$__params[0];
        $modeldb = new MenuItemVM();
        try {
            $modeldb->Delete($id);
            Common::ToUrl("/admin/menu");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    public function GetOrderNum()
    {
        $id = App::$__params[0];
        $modeldb = new MenuItemVM();
        $num = $modeldb->GetDataTable("`OrderNum` = (SELECT MAX(`OrderNum`) FROM `tbl_menuitem`) AND `IdGroup` = " . $id)->fetch_array();
        $result = new MenuItemVM($num);
        echo $result->OrderNum + 1;
    }
}
