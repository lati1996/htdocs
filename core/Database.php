<?php

namespace core;

use app\App;
use Exception;
use mysqli;

class Database
{
    //private $__conn;
    public static $DbConnect;
    function __construct()
    {
        global $db_config;
        try {
            self::$DbConnect = new mysqli($db_config['host'], $db_config['user'], isset($db_config['pass']) ? $db_config['pass'] : '', $db_config['db']);
            //var_dump(self::$DbConnect);
        } catch (Exception $exception) {
            $mess = $exception->getMessage();
            $data['mess'] = $mess;
            App::$app->loadError('database', $data);
            die();
        }
    }
    function GetById($id, $tableName)
    {
        $sql = "SELECT * FROM `$tableName` WHERE `Id` = {$id}";
        $result = self::$DbConnect->query($sql);
        if ($result == null)
            return null;
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
    public function GetByQuery($sql)
    {
        try {
            $result = self::$DbConnect->query($sql);
            if ($result) {
                return $result;
            }
            return null;
        } catch (Exception $exception) {
            $mess = $exception->getMessage();
            $data['messageError'] = $mess;
            App::$app->loadError('database', $data);
            die();
        }
    }

    public function DeleteQuery($tableName, $where = null)
    {
        if ($where == null) {
            return;
        } //" `id` = '10' "; 
        $sql = "DELETE FROM `{$tableName}` WHERE {$where}";

        return self::$DbConnect->query($sql);
    }
    function QueryPaging($tableName, $where, $pageIndex, $pageNumber, &$totalRows, $colums = null)
    {
        $select = "*";
        if ($colums != null) {
            $columsName = implode("`,`", $colums);
            $select = "`{$columsName}`";
        }
        $sql = "SELECT {$select} FROM `{$tableName}` WHERE {$where}";
        // if (isset($_GET["debug"])) {
        //     echo $sql;
        // }
        $result = self::$DbConnect->query($sql);

        if ($result == false) {
            $totalRows = 0;
            return null;
        }
        if ($result->num_rows == 0) {
            $totalRows = 0;
            return null;
        }
        // tổng so dòng trả về
        $totalRows = $result->num_rows;
        $start = ($pageIndex - 1) * $pageNumber;
        $sql = $sql . " limit {$start},{$pageNumber}";
        //return $sql;
        return self::$DbConnect->query($sql);
    }

    public function WhereEq($columname, $value)
    {
        return " `{$columname}` = '{$value}' ";
    }
    public function WhereLike($columname, $value, $f = "%", $l = "%")
    {
        return " `{$columname}` like '{$f}{$value}{$l}'";
    }
    public function WhereOr($where)
    {
        return " or {$where} ";
    }
    public function WhereInArray($columname, $listValue)
    {
        $strIn = implode("','", $listValue);
        $whereIn = "`{$strIn}'";
        return " `{$columname}` in ({$whereIn})";
    }
    public function WhereAnd($where)
    {
        return " and {$where} ";
    }
    public function INSERT($tableName, $data)
    {
        $columns = array_keys($data);
        $columnsSql = implode("`,`", $columns);
        $dataSql = implode("','", $data);
        $sql = "INSERT INTO `{$tableName}`
        (`{$columnsSql}`) VALUES ('{$dataSql}')";

        return self::$DbConnect->query($sql);
    }
    public function UPDATE($tableName, $data, $where)
    {
        $sqlData = "";
        foreach ($data as $colums => $dataColums) {
            $sqlData .= " `{$colums}`='{$dataColums}',";
        }
        $sqlData = substr($sqlData, 0, strlen($sqlData) - 1);
        $sql = "UPDATE `{$tableName}` SET {$sqlData} WHERE {$where}";
        //echo $sql;
        return self::$DbConnect->query($sql);
    }
    function SELECTROW($tableName = null, $where)
    {

        $sql = "SELECT * FROM `{$tableName}` WHERE {$where}";
        $result = self::$DbConnect->query($sql);
        if ($result == false)
            return null;
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
    function SELECTROWS($tableName, $where)
    {
        $sql = "SELECT * FROM `{$tableName}` WHERE {$where}";
        $result = self::$DbConnect->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        }
        return null;
    }
    function DELETEDB($tableName, $where)
    {
        $sql = "DELETE FROM `{$tableName}` WHERE {$where}";
        $result = self::$DbConnect->query($sql);
        return $result;
    }
    // lấy du liệu và chuyển qua dang [[Key=>value],[Key=>value]]
    function Select2Options($tableName, $where, $colName)
    {
        $result = $this->SELECTROWS($tableName, $where);
        if ($result == null) {
            return [];
        }
        $op = [];
        while ($row = $result->fetch_assoc()) {
            $op[$row[$colName[0]]] = $row[$colName[1]];
        }
        return $op;
    }

    function OrderBy($columName, $isDesc = false)
    {
        $Desc = "ASC";
        if ($isDesc == true) {
            $Desc = "DESC";
        }
        $columnsSql = implode("`,`", $columName);
        return " ORDER BY `{$columnsSql}` {$Desc}";
    }

    public function Limit($start = 0, $number = 10)
    {
        $start = max(0, $start);
        $number = max(1, $number);
        return " Limit {$start},{$number}";
    }
}
