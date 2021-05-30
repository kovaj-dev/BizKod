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
                    WHERE id_tim = :tim AND (NOW() BETWEEN pocetak AND kraj)";
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
                    WHERE id_tim = :tim AND (DATE_ADD(NOW(), INTERVAL 7 DAY) BETWEEN pocetak AND kraj)";
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

    public function selectTimeToTheEndOfWeek()
    {
        try {
            $sql = "SELECT IF((kraj - NOW()) > 86400,1,0) timeToTheEnd FROM nedelja
                    WHERE NOW() BETWEEN pocetak AND kraj";
            $this->db->query($sql);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectFutureScheduleExist()
    {
        try {
            $sql = "SELECT id FROM nedelja
                    WHERE DATE_ADD(NOW(), INTERVAL 7 DAY) BETWEEN pocetak AND kraj";
            $this->db->query($sql);
            $this->db->execute();
            return $this->db->getRowCount();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectFutureScheduleInterval()
    {
        try {
            $sql = "SELECT DATE_ADD(pocetak, INTERVAL 7 DAY) nextStart, DATE_ADD(kraj, INTERVAL 7 DAY) nextEnd 
                    FROM nedelja
                    WHERE NOW() BETWEEN pocetak AND kraj";
            $this->db->query($sql);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function generateFutureSchedule($start, $end)
    {
        try {
            $sql = "INSERT INTO nedelja (pocetak, kraj) VALUES (:start, :end)";
            $this->db->query($sql);
            $this->db->bind(':start', $start);
            $this->db->bind(':end', $end);
            return $this->db->execute();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectUserExistInFutureSchedule($id)
    {
        try {
            $sql = "SELECT id_zaposlen FROM raspored r
                    JOIN nedelja n on n.id = r.id_raspored
                    WHERE DATE_ADD(NOW(), INTERVAL 7 DAY) BETWEEN pocetak AND kraj
                     AND id_zaposlen = :id";
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $this->db->execute();
            return $this->db->getRowCount();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function updateUserSchedule($id, $mon, $tue, $wed, $thu, $fri)
    {
        try {
            $sql = "UPDATE raspored
                    SET ponedeljak = :monday, utorak = :tuesday, sreda = :wednesday, cetvrtak = :thursday, petak = :friday
                    WHERE id_zaposlen = :id AND id_raspored = (SELECT id FROM nedelja
                                           WHERE DATE_ADD(NOW(), INTERVAL 7 DAY) BETWEEN pocetak AND kraj)";
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $this->db->bind(':monday', $mon);
            $this->db->bind(':tuesday', $tue);
            $this->db->bind(':wednesday', $wed);
            $this->db->bind(':thursday', $thu);
            $this->db->bind(':friday', $fri);
            return $this->db->execute();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectFutureScheduleId()
    {
        try {
            $sql = "SELECT id FROM nedelja
                    WHERE DATE_ADD(NOW(), INTERVAL 7 DAY) BETWEEN pocetak AND kraj";
            $this->db->query($sql);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function insertUserInSchedule($scheduleId, $userId, $mon, $tue, $wed, $thu, $fri)
    {
        try {
            $sql = "INSERT INTO raspored VALUES (:scheduleId, :userId, :mon, :tue, :wed, :thu, :fri)";
            $this->db->query($sql);
            $this->db->bind(':scheduleId', $scheduleId);
            $this->db->bind(':userId', $userId);
            $this->db->bind(':mon', $mon);
            $this->db->bind(':tue', $tue);
            $this->db->bind(':wed', $wed);
            $this->db->bind(':thu', $thu);
            $this->db->bind(':fri', $fri);
            return $this->db->execute();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectFutureScheduleForUser($userId)
    {
        try {
            $sql = "SELECT id_zaposlen, ponedeljak, utorak, sreda, cetvrtak, petak FROM raspored r
                    JOIN nedelja n on n.id = r.id_raspored
                    WHERE DATE_ADD(NOW(), INTERVAL 7 DAY) BETWEEN pocetak AND kraj
                    AND id_zaposlen = :id";
            $this->db->query($sql);
            $this->db->bind(':id', $userId);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectTeamName($teamId)
    {
        try {
            $sql = "SELECT naziv FROM tim
                    WHERE id = :id";
            $this->db->query($sql);
            $this->db->bind(':id', $teamId);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectMondayChart($teamId, $place)
    {
        try {
            $sql = "select count(*) result from raspored r
                    join zaposlen z on z.id = r.id_zaposlen
                    join nedelja n on n.id = r.id_raspored
                    where ponedeljak = :place
                    AND id_raspored in (select n.id from nedelja
                    where DATE_ADD(now(), interval 7 day ) between n.pocetak and n.kraj)
                    and id_tim = :id";
            $this->db->query($sql);
            //$this->db->bind(':day', $day);
            $this->db->bind(':place', $place);
            $this->db->bind(':id', $teamId);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectTuesdayChart($teamId, $place)
    {
        try {
            $sql = "select count(*) result from raspored r
                    join zaposlen z on z.id = r.id_zaposlen
                    join nedelja n on n.id = r.id_raspored
                    where utorak = :place
                    AND id_raspored in (select n.id from nedelja
                    where DATE_ADD(now(), interval 7 day ) between n.pocetak and n.kraj)
                    and id_tim = :id";
            $this->db->query($sql);
            //$this->db->bind(':day', $day);
            $this->db->bind(':place', $place);
            $this->db->bind(':id', $teamId);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectWednesdayChart($teamId, $place)
    {
        try {
            $sql = "select count(*) result from raspored r
                    join zaposlen z on z.id = r.id_zaposlen
                    join nedelja n on n.id = r.id_raspored
                    where sreda = :place
                    AND id_raspored in (select n.id from nedelja
                    where DATE_ADD(now(), interval 7 day ) between n.pocetak and n.kraj)
                    and id_tim = :id";
            $this->db->query($sql);
            //$this->db->bind(':day', $day);
            $this->db->bind(':place', $place);
            $this->db->bind(':id', $teamId);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectThursdayChart($teamId, $place)
    {
        try {
            $sql = "select count(*) result from raspored r
                    join zaposlen z on z.id = r.id_zaposlen
                    join nedelja n on n.id = r.id_raspored
                    where cetvrtak = :place
                    AND id_raspored in (select n.id from nedelja
                    where DATE_ADD(now(), interval 7 day ) between n.pocetak and n.kraj)
                    and id_tim = :id";
            $this->db->query($sql);
            //$this->db->bind(':day', $day);
            $this->db->bind(':place', $place);
            $this->db->bind(':id', $teamId);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function selectFridayChart($teamId, $place)
    {
        try {
            $sql = "select count(*) result from raspored r
                    join zaposlen z on z.id = r.id_zaposlen
                    join nedelja n on n.id = r.id_raspored
                    where petak = :place
                    AND id_raspored in (select n.id from nedelja
                    where DATE_ADD(now(), interval 7 day ) between n.pocetak and n.kraj)
                    and id_tim = :id";
            $this->db->query($sql);
            //$this->db->bind(':day', $day);
            $this->db->bind(':place', $place);
            $this->db->bind(':id', $teamId);
            $this->db->execute();
            return $this->db->getResult();
        } catch (\PDOException $e) {
            return false;
        }
    }
}