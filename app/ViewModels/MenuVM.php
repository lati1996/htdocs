<?php

namespace app\ViewModels;

use core\Model;

class MenuVM extends Model
{
    public $Id;
    public $MenuGroupName;
    const tableName = "tbl_groupmenu";
    function __construct($menu = null)
    {

        if (!empty($menu)) {
            if (!is_array($menu)) {
                $id = $menu;
                $menu = $this->GetProductById($id);
            }
        }
        $this->Id = isset($menu["Id"]) ? $menu["Id"] : null;
        $this->MenuGroupName = isset($menu["MenuGroupName"]) ? $menu["MenuGroupName"] : null;
    }
    function Post($item)
    {
        return $this->INSERT(MenuVM::tableName, $item);
    }
    function GetPaging($params, $pageIndex, $pageNumber, &$totalRows)
    {
        $keyword = $params["keyword"] ?? "";
        if (!empty($keyword)) {
            $where = $this->WhereLike("Id", $keyword);
            $where .= $this->WhereOr($this->WhereLike("MenuGroupName", $keyword));
        } else {
            $where = "1";
        }
        //echo $where;
        return $this->QueryPaging(MenuVM::tableName, $where, $pageIndex, $pageNumber, $totalRows);
    }
    function GetDataTable()
    {
        return $this->SELECTROWS(MenuVM::tableName, "1");
    }
    function Delete($id)
    {
        return $this->DELETEDB(MenuVM::tableName, $this->WhereEq("Id", $id));
    }
    function GetProductById($id)
    {
        return $this->SELECTROW(MenuVM::tableName, $this->WhereEq("Id", $id));
    }
    function Put($item)
    {
        return $this->UPDATE(MenuVM::tableName, $item, $this->WhereEq("Id", $item["Id"]));
    }
}
