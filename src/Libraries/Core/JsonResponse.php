<?php


namespace App\Libraries\Core;


class JsonResponse
{
    public function __construct($data = [])
    {
        header("Content-type:application/json");
        exit(json_encode($data));
    }
}