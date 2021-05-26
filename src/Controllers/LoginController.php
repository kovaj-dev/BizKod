<?php


namespace App\Controllers;


use App\Libraries\Core\BaseController;
use App\Libraries\Core\JsonResponse;
use App\Libraries\Services\Validation;
use App\Models\UserModel;

class LoginController extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model(new UserModel());
    }

    public function loginUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $errors = Validation::validateLogin($email, $password);
        if (empty($errors["email"]) && empty($errors["password"])){
            $data = $this->userModel->selectUserExist($email);
            if (!empty($data->email) && password_verify($password, $data->sifra)) {
                session_start();
                $_SESSION["user"] = ["email" => $email];
                return new JsonResponse(["status" => "2", "msg" => "uspešan login"]);
            }
            return new JsonResponse(["status" => "1", "msg" => "Pogrešan email ili lozinka"]);
        }
        return new JsonResponse(["status" => "0", "msg" => $errors]);
    }
}