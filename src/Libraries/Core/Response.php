<?php


namespace App\Libraries\Core;


class Response
{
    public function __construct($path,$args = [])
    {
        $view = new View($path);
        foreach ($args as $key => $value) {
            $view->assign($key,$value);
        }
        $view->render();
    }
}