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
        if (empty(trim($email))){
            $errorMess["email"] = "Molimo vas unesite vaš email";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errorMess["email"] = "Pogrešan format email-a";
        }
        if (empty(trim($password))){
            $errorMess['password'] = "Molimo vas unesite vašu lozinku";
        }

        return $errorMess;
    }

    public static function validateNewPassword($old, $new, $confirm) :bool
    {
        $isValid = true;
        $pattern = "/^.*(?=.{8,})((?=.*[!@#$%^&*()\-_=+{};:,<.>]){1})(?=.*\d)((?=.*[a-z]){1})((?=.*[A-Z]){1}).*$/";
        if (empty($old) || empty($new) || empty($confirm)){
            $isValid = false;
        }
        if (strlen($old) < 8) {
            $isValid = false;
        }
        if (strlen($new) < 8) {
            $isValid = false;
        }
        if (!preg_match($pattern, $new)) {
            $isValid = false;
        }
        if ($new !== $confirm) {
            $isValid = false;
        }

        return $isValid;
    }
}