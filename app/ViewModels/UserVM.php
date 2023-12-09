<?php

namespace app\ViewModels;

use core\Model;

class UserVM extends Model
{
    public $Id;
    public $Name;
    public $Email;
    public $Phone;
    public $Account;
    public $Password;
    public $Address;
    public $Ward;
    public $District;
    public $Province;
    const tableName = "tbl_user";
    function __construct($user = null)
    {
        if (!is_array($user)) {
            $id = $user;
            $user = $this->GetUserById($id);
            // var_dump($sanpham);
        }
        $this->Id = isset($user["Id"]) ? $user["Id"] : null;
        $this->Name = isset($user["Name"]) ? $user["Name"] : null;
        $this->Email = isset($user["Email"]) ? $user["Email"] : null;
        $this->Phone = isset($user["Phone"]) ? $user["Phone"] : null;
        $this->Account = isset($user["Account"]) ? $user["Account"] : null;
        $this->Password = isset($user["Password"]) ? $user["Password"] : null;
        $this->Address = isset($user["Address"]) ? $user["Address"] : null;
        $this->Ward = isset($user["Ward"]) ? $user["Ward"] : null;
        $this->District = isset($user["District"]) ? $user["District"] : null;
        $this->Province = isset($user["Province"]) ? $user["Province"] : null;
    }
    function Post($item)
    {
        return $this->INSERT(UserVM::tableName, $item);
    }
    function GetPaging($params, $pageIndex, $pageNumber, &$totalRows)
    {
        $keyword = $params["keyword"] ?? "";
        if (!empty($keyword)) {
            $where = $this->WhereLike("Id", $keyword);
            $where .= $this->WhereOr($this->WhereLike("Name", $keyword));
            $where .= $this->WhereOr($this->WhereLike("Email", $keyword));
            $where .= $this->WhereOr($this->WhereLike("Address", $keyword));
            $where .= $this->WhereOr($this->WhereLike("Phone", $keyword));
        } else {
            $where = "1=1";
        }
        //echo $where;
        return $this->QueryPaging(UserVM::tableName, $where, $pageIndex, $pageNumber, $totalRows);
    }
    function GetDataTable()
    {

        return $this->SELECTROWS(ProductVM::tableName, "1");
    }
    function Delete($id)
    {
        return $this->DELETEDB(UserVM::tableName, $this->WhereEq("Id", $id));
    }
    function GetUserById($id)
    {
        return $this->SELECTROW(UserVM::tableName, $this->WhereEq("Id", $id));
    }
    function Put($item)
    {
        return $this->UPDATE(UserVM::tableName, $item, $this->WhereEq("Id", $item["Id"]));
    }
    function Login($acc, $pass)
    {
        $sql = "SELECT * FROM " . UserVM::tableName . " WHERE `Account` = '{$acc}' and `Password` = '{$pass}'";
        $result = $this->GetByQuery($sql);
        if ($result == null) {
            return null;
        }
        return $result->fetch_assoc();
    }
    function CheckInfo($info)
    {
        if (!empty($info)) {
            $where = $this->WhereLike("Account", $info);
            $where .= $this->WhereOr($this->WhereLike("Email", $info));
            $where .= $this->WhereOr($this->WhereLike("Address", $info));
            $where .= $this->WhereOr($this->WhereLike("Phone", $info));
        } else {
            $where = "1=1";
        }
        $sql = "SELECT * FROM `tbl_user` WHERE " . $where;
        return $this->GetByQuery($sql);
    }
}
