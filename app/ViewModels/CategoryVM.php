<?php

namespace app\ViewModels;

use core\Model;

class CategoryVM extends Model
{
    public $Id;
    public $CategoryName;
    public $Description;
    const tableName = "tbl_category";
    function __construct($category = null)
    {

        if (!empty($category)) {
            if (!is_array($category)) {
                $id = $category;
                $category = $this->GetProductById($id);
            }
        }
        $this->Id = isset($category["Id"]) ? $category["Id"] : null;
        $this->CategoryName = isset($category["CategoryName"]) ? $category["CategoryName"] : null;
        $this->Description = isset($category["Description"]) ? $category["Description"] : null;
    }
    function Post($item)
    {
        return $this->INSERT(CategoryVM::tableName, $item);
    }
    function GetPaging($params, $pageIndex, $pageNumber, &$totalRows)
    {
        $keyword = $params["keyword"] ?? "";
        if (!empty($keyword)) {
            $where = $this->WhereLike("Id", $keyword);
            $where .= $this->WhereOr($this->WhereLike("CategoryName", $keyword));
            $where .= $this->WhereOr($this->WhereLike("Description", $keyword));
        } else {
            $where = "1";
        }
        //echo $where;
        return $this->QueryPaging(CategoryVM::tableName, $where, $pageIndex, $pageNumber, $totalRows);
    }
    function GetDataTable()
    {
        return $this->SELECTROWS(CategoryVM::tableName, "1");
    }
    function Delete($id)
    {
        return $this->DELETEDB(CategoryVM::tableName, $this->WhereEq("Id", $id));
    }
    function GetProductById($id)
    {
        return $this->SELECTROW(CategoryVM::tableName, $this->WhereEq("Id", $id));
    }
    function Put($item)
    {
        return $this->UPDATE(CategoryVM::tableName, $item, $this->WhereEq("Id", $item["Id"]));
    }
}
