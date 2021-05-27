<?php

namespace App\Controllers;

use App\Libraries\Core\BaseController;
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

    public function checkinPage() {
        if (isset($_COOKIE["session"]) && $_COOKIE["session"] === "set") {
            session_start();
            $id = $_SESSION["user"]["id"];
            $userSchedule = "";
            if ($this->scheduleModel->selectUserExistInFutureSchedule($id) > 0) {
                $userSchedule = $this->scheduleModel->selectFutureScheduleForUser($id);
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
            return new Response('home/infoPage', [
                "news" => $news,
                "teamnews" => $teamnews
            ]);
        }
        return new Response('home/loginPage');
    }

}