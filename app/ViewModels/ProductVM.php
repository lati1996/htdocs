<?php

namespace app\ViewModels;

use core\Common;
use core\Model;

class ProductVM extends Model
{
    public $Id;
    public $ProductName;
    public $Description;
    public $IdCate;
    public $Image;
    public $Quanity;
    public $Size;
    public $Price;
    public $ProdCode;
    public $Material;
    public $Rating;
    public $Unit;
    const tableName = "tbl_product";
    function __construct($product = null)
    {
        if (!is_array($product)) {
            $id = $product;
            $product = $this->GetProductById($id);
            //var_dump($product);
        }
        $this->Id = isset($product["Id"]) ? $product["Id"] : null;
        $this->ProductName = isset($product["ProductName"]) ? $product["ProductName"] : null;
        $this->Description = isset($product["Description"]) ? $product["Description"] : null;
        $this->IdCate = isset($product["IdCate"]) ? $product["IdCate"] : null;
        $this->Image = isset($product["Image"]) ? $product["Image"] : null;
        $this->Quanity = isset($product["Quanity"]) ? $product["Quanity"] : null;
        $this->Size = isset($product["Size"]) ? $product["Size"] : null;
        $this->Price = isset($product["Price"]) ? $product["Price"] : null;
        $this->ProdCode = isset($product["ProdCode"]) ? $product["ProdCode"] : null;
        $this->Material = isset($product["Material"]) ? $product["Material"] : null;
        $this->Rating = isset($product["Rating"]) ? $product["Rating"] : null;
        $this->Unit = isset($product["Unit"]) ? $product["Unit"] : null;
    }
    function Post($item)
    {
        return $this->INSERT(ProductVM::tableName, $item);
    }
    function GetTopProd($number)
    {
        $sql = "SELECT * FROM " . ProductVM::tableName . " WHERE 1 LIMIT " . $number;
        return $this->GetByQuery($sql);
    }
    function toPrice()
    {
        return Common::ViewMoney($this->Price);
    }
    function GetPaging($params, $pageIndex, $pageNumber, &$totalRows)
    {
        $keyword = $params["keyword"] ?? "";
        if (!empty($keyword)) {
            $where = $this->WhereLike("Id", $keyword);
            $where .= $this->WhereOr($this->WhereLike("ProductName", $keyword));
            $where .= $this->WhereOr($this->WhereLike("Description", $keyword));
            $where .= $this->WhereOr($this->WhereLike("IdCate", $keyword));
            $where .= $this->WhereOr($this->WhereLike("Image", $keyword));
        } else {
            $where = "1";
        }
        //echo $where;
        return $this->QueryPaging(ProductVM::tableName, $where . " ORDER BY `Id` DESC", $pageIndex, $pageNumber, $totalRows);
    }
    function GetPagingByCategory($params, $pageIndex, $pageNumber, &$totalRows, $idCate)
    {
        $keyword = $params["keyword"] ?? "";
        $where = $this->WhereEq("IdCate", $idCate);
        if (!empty($keyword)) {
            //$where .= $this->WhereOr($this->WhereLike("Id", $keyword));
            $where .= $this->WhereAnd($this->WhereLike("ProductName", $keyword));
            //$where .= $this->WhereOr($this->WhereLike("Description", $keyword));
            //$where .= $this->WhereOr($this->WhereLike("IdCate", $keyword));
            //$where .= $this->WhereOr($this->WhereLike("Image", $keyword));
        }
        //echo $where;
        return $this->QueryPaging(ProductVM::tableName, $where . " ORDER BY `Id` DESC", $pageIndex, $pageNumber, $totalRows);
    }
    function GetListProdByCategory($idCate)
    {
        $where = $this->WhereEq("IdCate", $idCate);
        return $this->SELECTROWS(ProductVM::tableName, $where);
    }
    function GetDataTable()
    {

        return $this->SELECTROWS(ProductVM::tableName, "1");
    }
    function Delete($id)
    {
        return $this->DELETEDB(ProductVM::tableName, $this->WhereEq("Id", $id));
    }
    function GetProductById($id)
    {
        return $this->SELECTROW(ProductVM::tableName, $this->WhereEq("Id", $id));
    }
    function Put($item)
    {
        return $this->UPDATE(ProductVM::tableName, $item, $this->WhereEq("Id", $item["Id"]));
    }
    function GetIdbyImg($img)
    {
        $item = $this->GetByQuery("SELECT * FROM `tbl_Product` WHERE `Image` = '" . $img . "'")->fetch_array();
        $data = new ProductVM($item);
        return $data->Id;
    }
}
