<?php


namespace App\Models;


use App\Libraries\Core\Database;
use App\Libraries\Core\ModelInterface;

class UserModel implements ModelInterface
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectUserExist($email)
    {
        try {
            $sql = "SELECT email, sifra FROM zaposlen WHERE email = :email";
            $this->db->query($sql);
            $this->db->bind(':email', $email);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e){
            return false;
        }
    }
}