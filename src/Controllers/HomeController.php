<?php

namespace App\Controllers;

use App\Libraries\Core\BaseController;
use App\Libraries\Core\Response;
use App\Libraries\Core\View;

class HomeController extends BaseController
{
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
        return new Response('home/homePage');
    }
}