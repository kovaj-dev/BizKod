<?php


namespace App\Libraries\Services;


class Validation
{
    public static function validateLogin($email, $password) :bool
    {
        $isValid = true;
        if (empty(trim($email))){
            $isValid = false;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $isValid = false;
        }
        if (empty(trim($password))){
            $isValid = false;
        }

        return $isValid;
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