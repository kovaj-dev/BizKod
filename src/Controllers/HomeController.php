<?php

namespace App\Controllers;

use App\Libraries\Core\BaseController;
use App\Libraries\Core\Response;
use App\Libraries\Core\View;
use App\Models\UserModel;

class HomeController extends BaseController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model(new UserModel());
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
            return new Response('home/checkinPage');
        }
        return new Response('home/loginPage');
    }

    public function profilePage() {
        if (isset($_COOKIE["session"]) && $_COOKIE["session"] === "set") {
            return new Response('home/profilePage');
        }
        return new Response('home/loginPage');
    }

    public function infoPage() {
        if (isset($_COOKIE["session"]) && $_COOKIE["session"] === "set") {
            return new Response('home/infoPage');
        }
        return new Response('home/loginPage');
    }
}