<?php


namespace App\Controllers;


use App\Libraries\Core\BaseController;
use App\Libraries\Core\JsonResponse;
use App\Libraries\Services\Validation;
use App\Models\ScheduleModel;
use App\Models\UserModel;

class LoginController extends BaseController
{
    private $userModel;
    private $scheduleModel;

    public function __construct()
    {
        $this->userModel = $this->model(new UserModel());
        $this->scheduleModel = $this->model(new ScheduleModel());
    }

    public function loginUser()
    {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $errors = Validation::validateLogin($email, $password);
        if (empty($errors["email"]) && empty($errors["password"])){
            $data = $this->userModel->selectUserExist($email);
            if (!empty($data->email) && password_verify($password, $data->sifra)) {
                session_start();
                //if timeToTheEnd is 1, it is not sunday, else it is sunday
                if ($this->scheduleModel->selectTimeToTheEndOfWeek()->timeToTheEnd){
                    setcookie("session", "set", time() + 86400, "/", '', 1);
                } else {
                    setcookie("session", "set", strtotime('today 23:59'), "/", '', 1);
                }
                if ($this->scheduleModel->selectFutureScheduleExist() < 1) {
                    $interval = $this->scheduleModel->selectFutureScheduleInterval();
                    $this->scheduleModel->generateFutureSchedule($interval->nextStart, $interval->nextEnd);
                }
                $_SESSION["user"] = ["id" => $data->id, "email" => $email];
                return new JsonResponse(["status" => "2", "msg" => "uspešan login"]);
            }
            return new JsonResponse(["status" => "1", "msg" => "Pogrešan email ili lozinka"]);
        }
        return new JsonResponse(["status" => "0", "msg" => $errors]);
    }

    public function logoutUser()
    {
        session_start();
        if (isset($_SESSION["user"])) {
            session_destroy();
            header('Location: /bizkod/');
        }
    }
}