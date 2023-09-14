<?php
//base Model
namespace core;

use core\Database;

class Model extends Database
{
    protected $db;
    function __construct()
    {
        $this->db = new Database();
        //var_dump($this->db);
    }
}
