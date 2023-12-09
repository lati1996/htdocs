<?php

namespace app\ViewModels;

use core\Model;

class ImageVM extends Model
{
    public $Id;
    public $IdProd;
    public $Image;
    const tableName = "tbl_img";
    function __construct($item = null)
    {

        if (!empty($item)) {
            if (!is_array($item)) {
                $id = $item;
                $item = $this->GetProductById($id);
            }
        }
        $this->Id = isset($item["Id"]) ? $item["Id"] : null;
        $this->IdProd = isset($item["IdProd"]) ? $item["IdProd"] : null;
        $this->Image = isset($item["Image"]) ? $item["Image"] : null;
    }
    function Post($item)
    {
        return $this->INSERT(ImageVM::tableName, $item);
    }
    function GetPaging($params, $pageIndex, $pageNumber, &$totalRows)
    {
        $keyword = $params["keyword"] ?? "";
        if (!empty($keyword)) {
            $where = $this->WhereLike("Id", $keyword);
            $where .= $this->WhereOr($this->WhereLike("Image", $keyword));
        } else {
            $where = "1";
        }
        //echo $where;
        return $this->QueryPaging(ImageVM::tableName, $where, $pageIndex, $pageNumber, $totalRows);
    }
    function GetDataTable()
    {
        return $this->SELECTROWS(ImageVM::tableName, "1");
    }
    function GetImageShow1($idPro)
    {
        return $this->SELECTROWS(ImageVM::tableName, "`IdProd` =" . $idPro . " LIMIT 2");
    }
    function GetImageShow2($idPro)
    {
        return $this->SELECTROWS(ImageVM::tableName, "`IdProd` =" . $idPro . " LIMIT 2,3");
    }
    function GetImageShow3($idPro)
    {
        return $this->SELECTROWS(ImageVM::tableName, "`IdProd` =" . $idPro . " LIMIT 5,3");
    }
    function GetImageShow4($idPro)
    {
        return $this->SELECTROWS(ImageVM::tableName, "`IdProd` =" . $idPro . " LIMIT 8,3");
    }
    function GetImageShow5($idPro)
    {
        return $this->SELECTROWS(ImageVM::tableName, "`IdProd` =" . $idPro . " LIMIT 11,3");
    }
    function Delete($id)
    {
        return $this->DELETEDB(ImageVM::tableName, $this->WhereEq("Id", $id));
    }
    function DeleteByIdProd($id)
    {
        return $this->DELETEDB(ImageVM::tableName, $this->WhereEq("IdProd", $id));
    }
    function GetProductById($id)
    {
        return $this->SELECTROW(ImageVM::tableName, $this->WhereEq("Id", $id));
    }
    function Put($item)
    {
        return $this->UPDATE(ImageVM::tableName, $item, $this->WhereEq("Id", $item["Id"]));
    }
}
