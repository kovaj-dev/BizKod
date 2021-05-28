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
            $sql = "SELECT id, email, sifra, id_uloga FROM zaposlen WHERE email = :email";
            $this->db->query($sql);
            $this->db->bind(':email', $email);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e){
            return false;
        }
    }

    public function selectTeams()
    {
        try {
            $sql = "SELECT id, naziv, slika FROM tim";
            $this->db->query($sql);
            $this->db->execute();
            return $this->db->getResults();
        } catch (\PDOException $e){
            return false;
        }
    }

    public function selectUserData($id)
    {
        try {
            $sql = "SELECT email, ime, prezime, z.slika fotografija, t.naziv tim, k.naziv kancelarija, grad FROM zaposlen z
                    JOIN tim t on t.id = z.id_tim
                    JOIN kancelarija k on k.id = z.id_kancelarija
                    WHERE z.id = :id";
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e){
            return false;
        }
    }

    public function selectUserPassword($id)
    {
        try {
            $sql = "SELECT sifra FROM zaposlen
                    WHERE id = :id";
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e){
            return false;
        }
    }

    public function changePassword($userId, $password)
    {
        try {
            $sql = "UPDATE zaposlen
                    SET sifra = :new
                    WHERE id = :id";
            $this->db->query($sql);
            $this->db->bind(':new', $password);
            $this->db->bind(':id', $userId);
            return $this->db->execute();
        } catch (\PDOException $e){
            return false;
        }
    }

    public function selectUsersInTeam($userId)
    {
        try {
            $sql = "SELECT ime, prezime, slika FROM zaposlen
                    WHERE id_tim = (SELECT id_tim FROM zaposlen
                                    WHERE id = :id)";
            $this->db->query($sql);
            $this->db->bind(':id', $userId);
            $this->db->execute();
            return $this->db->getResults();
        } catch (\PDOException $e){
            return false;
        }
    }

    public function selectAllUsers()
    {
        try {
            $sql = "SELECT id FROM zaposlen";
            $this->db->query($sql);
            $this->db->execute();
            return $this->db->getResults();
        } catch (\PDOException $e) {
            return false;
        }
    }
}