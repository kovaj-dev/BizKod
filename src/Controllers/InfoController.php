<?php


namespace App\Controllers;


use App\Libraries\Core\BaseController;
use App\Libraries\Core\JsonResponse;
use App\Models\InfoModel;

class InfoController extends BaseController
{
    private $infoModel;
    public function __construct()
    {
        $this->infoModel = $this->model(new InfoModel());
    }

    public function insertNewsValues()
    {
        $title = trim($_POST['title']);
        $desc = trim($_POST['description']);
        $newsfor = $_POST['newsfor'];
        if (!empty($title) && !empty($desc) && (!empty($newsfor) || $newsfor === "0"))
        {
            if($this->infoModel->insertNews($title, $desc, $newsfor)) {
                return new JsonResponse(['status'=>"0"]);
            }
            return new JsonResponse(['status'=>"1"]);
        }
        return new JsonResponse(['status'=>"2"]);
    }
}