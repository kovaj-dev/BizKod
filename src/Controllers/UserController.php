<?php


namespace App\Controllers;


use App\Libraries\Core\BaseController;
use App\Libraries\Core\JsonResponse;
use App\Libraries\Core\Response;
use App\Libraries\Services\Validation;
use App\Models\UserModel;

class UserController extends BaseController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model(new UserModel());
    }

    public function changePassword()
    {
        if (isset($_COOKIE["session"]) && $_COOKIE["session"] === "set") {
            $old = $_POST['oldpass'];
            $new = $_POST['newpass'];
            $confirm = $_POST['confirmpass'];

            if (Validation::validateNewPassword($old, $new, $confirm)) {
                session_start();
                $id = $_SESSION["user"]["id"];
                $current = $this->userModel->selectUserPassword($id)->sifra;
                if (!empty($current)){
                    if (password_verify($old, $current)){
                        if ($old !== $new) {
                            $newPassword = password_hash($new, PASSWORD_BCRYPT);
                            if ($this->userModel->changePassword($id, $newPassword)){
                                return new JsonResponse(["status" => "1", "msg" => "uspešno ste promenili lozinku"]);
                            }
                            return new JsonResponse(["status" => "0", "msg" => "nešto nije u redu"]);
                        }
                        return new JsonResponse(["status" => "0", "msg" => "trenutna i nova lozinka su iste"]);
                    }
                    return new JsonResponse(["status" => "0", "msg" => "nešto nije u redu"]);
                }
                return new JsonResponse(["status" => "0", "msg" => "nešto nije u redu"]);
            }
            return new JsonResponse(["status" => "0", "msg" => "nešto nije u redu"]);
        }
        return new JsonResponse(["status" => "2"]);
    }

}