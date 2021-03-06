<?php

require_once 'src/init.php';

use App\Libraries\Core\View;

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r){
    $r->addRoute('GET', '/', 'HomeController/index');
    $r->addRoute('POST', '/login', 'LoginController/loginUser');
    $r->addRoute('GET', '/home', 'HomeController/homePage');
    $r->addRoute('GET', '/team', 'HomeController/teamPage');
    $r->addRoute('GET', '/schedule/{id:\d+}', 'ScheduleController/showScheduleForTeam');
    $r->addRoute('GET', '/checkin/{id:\d+}', 'HomeController/checkinPage');
    $r->addRoute('GET', '/info', 'HomeController/infoPage');
    $r->addRoute('POST','/insertnews', 'InfoController/insertNewsValues');
    $r->addRoute('GET', '/profile', 'HomeController/profilePage');
    $r->addRoute('GET', '/logout', 'LoginController/logoutUser');
    $r->addRoute('POST', '/submitvalues', 'ScheduleController/submitNextScheduleValues');
    $r->addRoute('POST', '/newpassword', 'UserController/changePassword');
    $r->addRoute('GET', '/statspage', 'HomeController/statsPage');
    $r->addRoute('POST', '/statistic', 'HomeController/showStatistic');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$uri = str_replace('/bizkod','',$uri);

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
    case FastRoute\Dispatcher::NOT_FOUND:
        $fqcn = "App\\Controllers\\HomeController";
        call_user_func(array(new $fqcn,"error"));
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($class, $method) = explode("/", $handler, 2);
        $fqcn = 'App\\Controllers\\' . $class;
        call_user_func_array(array(new $fqcn(), $method), $vars);
        break;
}