<?php

namespace app\ViewModels;

use core\Model;

class MenuItemVM extends Model
{
    public $Id;
    public $Name;
    public $IdGroup;
    public $Link;
    public $Icon;
    public $OrderNum;

    const tableName = "tbl_menuitem";
    function __construct($menu = null)
    {

        if (!empty($menu)) {
            if (!is_array($menu)) {
                $id = $menu;
                $menu = $this->GetProductById($id);
            }
        }
        $this->Id = isset($menu["Id"]) ? $menu["Id"] : null;
        $this->Name = isset($menu["Name"]) ? $menu["Name"] : null;
        $this->IdGroup = isset($menu["IdGroup"]) ? $menu["IdGroup"] : null;
        $this->Link = isset($menu["Link"]) ? $menu["Link"] : null;
        $this->Icon = isset($menu["Icon"]) ? $menu["Icon"] : null;
        $this->OrderNum = isset($menu["OrderNum"]) ? $menu["OrderNum"] : null;
    }
    function Post($item)
    {
        return $this->INSERT(MenuItemVM::tableName, $item);
    }
    function GetPaging($params, $pageIndex, $pageNumber, &$totalRows)
    {
        $keyword = $params["keyword"] ?? "";
        if (!empty($keyword)) {
            $where = $this->WhereLike("Id", $keyword);
            $where .= $this->WhereOr($this->WhereLike("Name", $keyword));
            $where .= $this->WhereOr($this->WhereLike("IdGroup", $keyword));
            $where .= $this->WhereOr($this->WhereLike("Link", $keyword));
            $where .= $this->WhereOr($this->WhereLike("OrderNum", $keyword));
        } else {
            $where = "1";
        }
        //echo $where;
        return $this->QueryPaging(MenuItemVM::tableName, $where, $pageIndex, $pageNumber, $totalRows);
    }
    function GetDataTable($where = null)
    {
        return $this->SELECTROWS(MenuItemVM::tableName, isset($where) ? $where : "1");
    }
    function Delete($id)
    {
        return $this->DELETEDB(MenuItemVM::tableName, $this->WhereEq("Id", $id));
    }
    function GetProductById($id)
    {
        return $this->SELECTROW(MenuItemVM::tableName, $this->WhereEq("Id", $id));
    }
    function Put($item)
    {
        return $this->UPDATE(MenuItemVM::tableName, $item, $this->WhereEq("Id", $item["Id"]));
    }
    function GetOrderNum($id)
    {
        return $this->GetByQuery("SELECT MAX(`OrderNum`) FROM `tbl_menuitem` WHERE `IdGroup` =" . $id);
    }
}
