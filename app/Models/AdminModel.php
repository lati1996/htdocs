<?php

namespace app\Models;

use core\Model;

class AdminModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function CheckLogin($account, $password)
    {
        $sql = "SELECT * FROM `tbl_admin` WHERE `Account` = '{$account}' and `Password` = '{$password}'";
        $result = $this->GetByQuery($sql);
        if ($result == null) {
            return null;
        }
        return $result->fetch_assoc();
    }
    function GetList()
    {
        $sql = "SELECT * FROM `tbl_user`";
        $result = $this->GetByQuery($sql);
        //print_r($result);
        if (empty($result)) {
            return null;
        }

        return $result;
    }
    function logout()
    {
        unset($_SESSION["admin"]);
        header("Location: /admin/login/index");
    }
}
