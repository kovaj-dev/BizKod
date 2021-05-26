<?php


namespace App\Libraries\Services;


class Validation
{
    public static function validateLogin($email, $password) :array
    {
        $errorMess= [
            "email" => "",
            "password" => ""
        ];
        if (empty($email)){
            $errorMess["email"] = "Molimo vas unesite vaš email";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errorMess["email"] = "Pogrešan format email-a";
        }
        if (empty($password)){
            $errorMess['password'] = "Molimo vas unesite vašu lozinku";
        }

        return $errorMess;
    }
}