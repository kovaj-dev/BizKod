<?php


namespace App\Models;


use App\Libraries\Core\Database;
use App\Libraries\Core\ModelInterface;
use mysql_xdevapi\Exception;

class InfoModel implements ModelInterface
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectGeneralNews() {
        try {
            $sql = "SELECT * FROM vesti WHERE id_tim = 0";
            $this->db->query($sql);
            $this->db->execute();
            return $this->db->getResults();
        } catch (\PDOException $e) {
            return false;
        }
    }
}