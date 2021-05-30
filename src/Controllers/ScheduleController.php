<?php


namespace App\Controllers;


use App\Libraries\Core\BaseController;
use App\Libraries\Core\JsonResponse;
use App\Libraries\Core\Response;
use App\Models\ScheduleModel;

class ScheduleController extends BaseController
{
    private $scheduleModel;
    public function __construct()
    {
        $this->scheduleModel = $this->model(new ScheduleModel());
    }

    public function showScheduleForTeam($id)
    {
        if (isset($_COOKIE["session"]) && $_COOKIE["session"] === "set"){
            $future = [];
            if ($this->scheduleModel->selectTeamExistInSchedule($id) > 0){
                $future = $this->scheduleModel->selectFutureScheduleForTeam($id);
            }
            else{
                $future = $this->scheduleModel->selectFutureSchedule($id);
            }
            $schedule = $this->scheduleModel->selectCurrentScheduleForTeam($id);
            $teamName = $this->scheduleModel->selectTeamName($id);

            return new Response('home/schedulePage', [
                "schedule" => $schedule,
                "future" => $future,
                "teamName" => $teamName
            ]);
        }
        return new Response('home/loginPage');
    }

    public function submitNextScheduleValues()
    {
        $monday = $_POST['monday'];
        $tuesday = $_POST['tuesday'];
        $wednesday = $_POST['wednesday'];
        $thursday = $_POST['thursday'];
        $friday = $_POST['friday'];
        $userId = $_POST['userId'];
        $allowed = ["0", "1", "2"];
        if (!in_array($monday, $allowed, false)){
            $monday = "0";
        }
        if (!in_array($tuesday, $allowed, false)){
            $tuesday = "0";
        }
        if (!in_array($wednesday, $allowed, false)){
            $wednesday = "0";
        }
        if (!in_array($thursday, $allowed, false)){
            $thursday = "0";
        }
        if (!in_array($friday, $allowed, false)){
            $friday = "0";
        }

        session_start();
        $userIdCurrent = $_SESSION["user"]["id"];
        if ($userId !== $userIdCurrent)
        {
            $userIdCurrent = $userId;
        }
        if ($this->scheduleModel->selectUserExistInFutureSchedule($userIdCurrent) > 0)
        {
            if ($this->scheduleModel->updateUserSchedule($userIdCurrent, $monday, $tuesday, $wednesday, $thursday, $friday)){
                return new JsonResponse(["status" => "0", "msg" => "prijava uspela"]);
            }
            return new JsonResponse(["status" => "1", "msg" => "prijava nije uspela"]);
        }
        $scheduleId = $this->scheduleModel->selectFutureScheduleId()->id;
        if ($this->scheduleModel->insertUserInSchedule($scheduleId, $userIdCurrent, $monday, $tuesday, $wednesday, $thursday, $friday)) {
            return new JsonResponse(["status" => "0", "msg" => "prijava uspela"]);
        }
        return new JsonResponse(["status" => "1", "msg" => "prijava nije uspela"]);
    }
}