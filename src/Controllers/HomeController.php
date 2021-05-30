<?php

namespace App\Controllers;

use App\Libraries\Core\BaseController;
use App\Libraries\Core\JsonResponse;
use App\Libraries\Core\Response;
use App\Libraries\Core\View;
use App\Models\InfoModel;
use App\Models\ScheduleModel;
use App\Models\UserModel;

class HomeController extends BaseController
{
    private $userModel;
    private $infoModel;
    private $scheduleModel;
    public function __construct()
    {
        $this->userModel = $this->model(new UserModel());
        $this->infoModel = $this->model(new InfoModel());
        $this->scheduleModel = $this->model(new ScheduleModel());
    }

    public function index()
    {
        return new Response('home/loginPage');
    }

    public function error()
    {
        return new Response('home/errorPage');
    }

    public function homePage()
    {
        if (isset($_COOKIE["session"]) && $_COOKIE["session"] === "set") {
            $teams = $this->userModel->selectTeams();
            return new Response('home/homePage', [
                "teams" => $teams
            ]);
        }
        return new Response('home/loginPage');
    }

    public function teamPage()
    {
        if (isset($_COOKIE["session"]) && $_COOKIE["session"] === "set") {
            session_start();
            $userId = $_SESSION["user"]["id"];
            $teamId = $this->userModel->selectTeamIdForUser($userId);
            $team = $this->scheduleModel->selectCurrentScheduleForTeam($teamId->timId);

            return new Response('home/teamPage', [
                "team" => $team
            ]);
        }
        return new Response('home/loginPage');
    }

    public function checkinPage($id) {
        if (isset($_COOKIE["session"]) && $_COOKIE["session"] === "set") {
            session_start();
            $idUser = $_SESSION["user"]["id"];
            $userSchedule = "";
            if ($id === '0'){
                if ($this->scheduleModel->selectUserExistInFutureSchedule($idUser) > 0) {
                    $userSchedule = $this->scheduleModel->selectFutureScheduleForUser($idUser);
                }
            } else{
                if ($this->scheduleModel->selectUserExistInFutureSchedule($id) > 0) {
                    $userSchedule = $this->scheduleModel->selectFutureScheduleForUser($id);
                }
            }

            return new Response('home/checkinPage', [
                "userSchedule" => $userSchedule
            ]);
        }
        return new Response('home/loginPage');
    }

    public function profilePage() {
        if (isset($_COOKIE["session"]) && $_COOKIE["session"] === "set") {
            session_start();
            $userId = $_SESSION["user"]["id"];
            $userInfo = $this->userModel->selectUserData($userId);
            return new Response('home/profilePage', [
                "userInfo" => $userInfo
            ]);
        }
        return new Response('home/loginPage');
    }

    public function infoPage() {
        if (isset($_COOKIE["session"]) && $_COOKIE["session"] === "set") {
            $news = $this->infoModel->selectGeneralNews();
            session_start();
            $userId = $_SESSION["user"]["id"];
            $teamnews = $this->infoModel->selectTeamNews($userId);
            $teamid = $this->infoModel->selectUserTeam($userId);
            return new Response('home/infoPage', [
                "news" => $news,
                "teamnews" => $teamnews,
                "teamid" => $teamid
            ]);
        }
        return new Response('home/loginPage');
    }

    public function showStatistic()
    {
        if (isset($_COOKIE["session"]) && $_COOKIE["session"] === "set") {
            session_start();
            $userId = $_SESSION["user"]["id"];
            $teamId = $this->userModel->selectTeamIdForUser($userId);
            $mondayChartNone = $this->scheduleModel->selectMondayChart($teamId->timId, 0);
            $mondayChartHome = $this->scheduleModel->selectMondayChart($teamId->timId, 1);
            $mondayChartOffice = $this->scheduleModel->selectMondayChart($teamId->timId, 2);
            $mondayChartData = [$mondayChartNone, $mondayChartHome, $mondayChartOffice];

            $tuesdayChartNone = $this->scheduleModel->selectTuesdayChart($teamId->timId, 0);
            $tuesdayChartHome = $this->scheduleModel->selectTuesdayChart($teamId->timId, 1);
            $tuesdayChartOffice = $this->scheduleModel->selectTuesdayChart($teamId->timId, 2);
            $tuesdayChartData = [$tuesdayChartNone, $tuesdayChartHome, $tuesdayChartOffice];

            $wednesdayChartNone = $this->scheduleModel->selectWednesdayChart($teamId->timId, 0);
            $wednesdayChartHome = $this->scheduleModel->selectWednesdayChart($teamId->timId, 1);
            $wednesdayChartOffice = $this->scheduleModel->selectWednesdayChart($teamId->timId, 2);
            $wednesdayChartData = [$wednesdayChartNone, $wednesdayChartHome, $wednesdayChartOffice];

            $thursdayChartNone = $this->scheduleModel->selectThursdayChart($teamId->timId, 0);
            $thursdayChartHome = $this->scheduleModel->selectThursdayChart($teamId->timId, 1);
            $thursdayChartOffice = $this->scheduleModel->selectThursdayChart($teamId->timId, 2);
            $thursdayChartData = [$thursdayChartNone, $thursdayChartHome, $thursdayChartOffice];

            $fridayChartNone = $this->scheduleModel->selectFridayChart($teamId->timId, 0);
            $fridayChartHome = $this->scheduleModel->selectFridayChart($teamId->timId, 1);
            $fridayChartOffice = $this->scheduleModel->selectFridayChart($teamId->timId, 2);
            $fridayChartData = [$fridayChartNone, $fridayChartHome, $fridayChartOffice];

            return new JsonResponse([
                "monday" => $mondayChartData,
                "tuesday" => $tuesdayChartData,
                "wednesday" => $wednesdayChartData,
                "thursday" => $thursdayChartData,
                "friday" => $fridayChartData
            ]);
        }
        return new Response('home/loginPage');
    }

    public function statsPage()
    {
        if (isset($_COOKIE["session"]) && $_COOKIE["session"] === "set") {
            session_start();
            $userId = $_SESSION["user"]["id"];
            $teamId = $this->userModel->selectTeamIdForUser($userId);
            $team = $this->scheduleModel->selectFutureScheduleForTeam($teamId->timId);
            return new Response('home/statsPage', [
                "team" => $team
            ]);
        }
        return new Response('home/loginPage');
    }
}