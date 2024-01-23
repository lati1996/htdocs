<?php

namespace app\ViewModels;

use core\Model;

class SizeVM extends Model
{
    public $Id;
    public $SizeName;
    public $IdProd;
    public $SizePrice;
    const tableName = "tbl_size";
    function __construct($item = null)
    {

        if (!empty($item)) {
            if (!is_array($item)) {
                $id = $item;
                $item = $this->GetProductById($id);
            }
        }
        $this->Id = isset($item["Id"]) ? $item["Id"] : null;
        $this->SizeName = isset($item["SizeName"]) ? $item["SizeName"] : null;
        $this->IdProd = isset($item["IdProd"]) ? $item["IdProd"] : null;
        $this->SizePrice = isset($item["SizePrice"]) ? $item["SizePrice"] : null;
    }
    function Post($item)
    {
        return $this->INSERT(SizeVM::tableName, $item);
    }
    function GetDataTable($where)
    {
        return $this->SELECTROWS(SizeVM::tableName, $where);
    }
    function Delete($id)
    {
        return $this->DELETEDB(SizeVM::tableName, $this->WhereEq("Id", $id));
    }
    function GetProductById($id)
    {
        return $this->SELECTROW(SizeVM::tableName, $this->WhereEq("Id", $id));
    }
    function Put($item)
    {
        return $this->UPDATE(SizeVM::tableName, $item, $this->WhereEq("Id", $item["Id"]));
    }
}
