<?php


namespace App\Models;


use App\Libraries\Core\Database;
use App\Libraries\Core\ModelInterface;

class ScheduleModel implements ModelInterface
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
}