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

    public function selectCurrentScheduleForTeam($teamId)
    {
        try {
            $sql = "SELECT zaposlen.id, ime, prezime, slika, ponedeljak, utorak, sreda, cetvrtak, petak FROM zaposlen
                    LEFT JOIN raspored tr on zaposlen.id = tr.id_zaposlen
                    LEFT JOIN nedelja r on r.id = tr.id_raspored
                    WHERE id_tim = :tim AND (NOW() BETWEEN pocetak AND kraj OR id_raspored is null)";
            $this->db->query($sql);
            $this->db->bind(':tim', $teamId);
            $this->db->execute();
            return $this->db->getResults();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectFutureScheduleForTeam($teamId)
    {
        try {
            $sql = "SELECT zaposlen.id, ime, prezime, slika, ponedeljak, utorak, sreda, cetvrtak, petak FROM zaposlen
                    LEFT JOIN raspored tr on zaposlen.id = tr.id_zaposlen
                    LEFT JOIN nedelja r on r.id = tr.id_raspored
                    WHERE id_tim = :tim AND (DATE_ADD(NOW(), INTERVAL 7 DAY) BETWEEN pocetak AND kraj OR id_raspored is null)";
            $this->db->query($sql);
            $this->db->bind(':tim', $teamId);
            $this->db->execute();
            return $this->db->getResults();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectFutureSchedule($teamId)
    {
        try {
            $sql = "SELECT zaposlen.id, ime, prezime, slika FROM zaposlen
                    WHERE id_tim = :tim";
            $this->db->query($sql);
            $this->db->bind(':tim', $teamId);
            $this->db->execute();
            return $this->db->getResults();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectTeamExistInSchedule($teamId)
    {
        try {
            $sql = "SELECT id_zaposlen broj FROM zaposlen
                    JOIN raspored r on zaposlen.id = r.id_zaposlen
                    JOIN nedelja n on n.id = r.id_raspored
                    WHERE id_tim = :tim AND DATE_ADD(NOW(), INTERVAL 7 DAY) BETWEEN pocetak AND kraj";
            $this->db->query($sql);
            $this->db->bind(':tim', $teamId);
            $this->db->execute();
            return $this->db->getRowCount();
        } catch (\PDOException $e) {
            return false;
        }
    }
}