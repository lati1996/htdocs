<?php

namespace app\ViewModels;

use core\Common;
use core\Model;


class CartVM extends Model
{
    public $Id;
    public $IdUser;
    public $IdProd;
    public $Quanity;
    public $Status;
    public $IdOrder;
    public $IdSize;

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
        $this->Quanity = isset($cart["Quanity"]) ? $cart["Quanity"] : null;
        $this->Status = isset($cart["Status"]) ? $cart["Status"] : null;
        $this->IdOrder = isset($cart["IdOrder"]) ? $cart["IdOrder"] : null;
        $this->IdSize = isset($cart["IdSize"]) ? $cart["IdSize"] : null;
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
    function GetDataTableWhere($idUser)
    {
        return $this->SELECTROWS(CartVM::tableName, $this->WhereEq("IdUser", $idUser));
    }
    function GetCart($idUser)
    {
        return $this->SELECTROWS(CartVM::tableName, $this->WhereEq("IdUser", $idUser) . $this->WhereAnd($this->WhereEq("Status", "0")));
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
    function TotalPrice()
    {
        $size = new SizeVM($this->IdSize);
        $price = $size->SizePrice;
        $total = $this->Quanity * $price;
        return $total;
    }
    function CheckCart($data)
    {
        $where = $this->WhereEq("IdUser", $data["IdUser"]) . $this->WhereAnd($this->WhereEq("IdProd", $data["IdProd"])) . $this->WhereAnd($this->WhereEq("Status", $data["Status"])) . $this->WhereAnd($this->WhereEq("IdSize", $data["IdSize"]));
        return $this->SELECTROW(CartVM::tableName, $where);
    }
}
