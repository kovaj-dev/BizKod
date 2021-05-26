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
        $teams = $this->userModel->selectTeams();
        return new Response('home/homePage', [
            "teams" => $teams
        ]);
    }

    public function checkinPage() {
        return new Response('home/checkinPage');
    }

    public function profilePage() {
        return new Response('home/profilePage');
    }
}