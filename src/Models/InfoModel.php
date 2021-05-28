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

    public function selectGeneralNews()
    {
        try {
            $sql = "SELECT * FROM vesti WHERE id_tim = 0
                    ORDER BY id DESC";
            $this->db->query($sql);
            $this->db->execute();
            return $this->db->getResults();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectTeamNews($userId)
    {
        try {
            $sql = "SELECT v.id idvesti, naslov, opis, vreme
                    FROM vesti v
                    JOIN tim t ON v.id_tim = t.id
                    JOIN zaposlen z on t.id = z.id_tim
                    WHERE z.id = :id
                    ORDER BY v.id DESC";
            $this->db->query($sql);
            $this->db->bind(':id', $userId);
            $this->db->execute();
            return $this->db->getResults();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectUserTeam($userId)
    {
        try {
            $sql = "SELECT tim.id id FROM tim
                    JOIN zaposlen z on tim.id = z.id_tim
                    WHERE z.id = :id";
            $this->db->query($sql);
            $this->db->bind(':id', $userId);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function insertNews($title, $desc, $teamId)
    {
        try {
            $sql = "INSERT INTO vesti(naslov, opis, id_tim) VALUES (:title, :descr, :id)";
            $this->db->query($sql);
            $this->db->bind(':title', $title);
            $this->db->bind(':descr', $desc);
            $this->db->bind(':id', $teamId);
            return $this->db->execute();
        } catch (\PDOException $e) {
            return false;
        }
    }
}