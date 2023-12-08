<?php

namespace app\ViewModels;

use core\Common;
use core\Model;

class OrderVM extends Model
{
    public $Id;
    public $TotalItem;
    public $TotalPrice;
    public $PaymentStatus;
    public $DeliveryAddress;
    public $DateCreate;
    public $PaymentMethod;

    const tableName = "tbl_order";
    function __construct($item = null)
    {
        if (!is_array($item)) {
            $id = $item;
            $item = $this->GetUserById($id);
            // var_dump($sanpham);
        }
        $this->Id = isset($item["Id"]) ? $item["Id"] : null;
        $this->TotalItem = isset($item["TotalItem"]) ? $item["TotalItem"] : null;
        $this->TotalPrice = isset($item["TotalPrice"]) ? $item["TotalPrice"] : null;
        $this->PaymentStatus = isset($item["PaymentStatus"]) ? $item["PaymentStatus"] : null;
        $this->DeliveryAddress = isset($item["DeliveryAddress"]) ? $item["DeliveryAddress"] : null;
        $this->DateCreate = isset($item["DateCreate"]) ? $item["DateCreate"] : null;
        $this->PaymentMethod = isset($item["PaymentMethod"]) ? $item["PaymentMethod"] : null;
    }
    function Post($item)
    {
        return $this->INSERT(OrderVM::tableName, $item);
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
        return $this->QueryPaging(OrderVM::tableName, $where, $pageIndex, $pageNumber, $totalRows);
    }
    function GetDataTableWhere($idUser)
    {
        return $this->SELECTROWS(OrderVM::tableName, $this->WhereEq("IdUser", $idUser));
    }
    function Getitem($idUser)
    {
        return $this->SELECTROWS(OrderVM::tableName, $this->WhereEq("IdUser", $idUser) . $this->WhereAnd($this->WhereEq("Status", "0")));
    }
    function Delete($id)
    {
        return $this->DELETEDB(OrderVM::tableName, $this->WhereEq("Id", $id));
    }
    function GetUserById($id)
    {
        return $this->SELECTROW(OrderVM::tableName, $this->WhereEq("Id", $id));
    }
    function Put($item)
    {
        return $this->UPDATE(OrderVM::tableName, $item, $this->WhereEq("Id", $item["Id"]));
    }
}
