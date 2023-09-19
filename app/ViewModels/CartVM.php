<?php

namespace app\ViewModels;

use core\Model;

class CartVM extends Model
{
    public $Id;
    public $IdUser;
    public $IdProd;
    public $Quantity;

    const tableName = "tbl_cart";
    function __construct($cart = null)
    {
        if (!is_array($cart)) {
            $id = $cart;
            $cart = $this->GetUserById($id);
            // var_dump($sanpham);
        }
        $this->Id = isset($cart["Id"]) ? $cart["Id"] : null;
        $this->IdUser = isset($cart["IdUser"]) ? $cart["IdUser"] : null;
        $this->IdProd = isset($cart["IdProd"]) ? $cart["IdProd"] : null;
        $this->Quantity = isset($cart["Quantity"]) ? $cart["Quantity"] : null;
    }
    function Post($item)
    {
        return $this->INSERT(CartVM::tableName, $item);
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
        return $this->QueryPaging(CartVM::tableName, $where, $pageIndex, $pageNumber, $totalRows);
    }
    function GetDataTableWhere($where)
    {
        return $this->SELECTROWS(CartVM::tableName, $where);
    }
    function Delete($id)
    {
        return $this->DELETEDB(CartVM::tableName, $this->WhereEq("Id", $id));
    }
    function GetUserById($id)
    {
        return $this->SELECTROW(CartVM::tableName, $this->WhereEq("Id", $id));
    }
    function Put($item)
    {
        return $this->UPDATE(CartVM::tableName, $item, $this->WhereEq("Id", $item["Id"]));
    }
}
