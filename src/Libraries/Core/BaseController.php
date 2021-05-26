<?php

namespace App\Libraries\Core;

class BaseController
{
    public function model(ModelInterface $model)
    {
        return $model;
    }
}