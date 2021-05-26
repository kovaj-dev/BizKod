<?php


namespace App\Controllers;


use App\Libraries\Core\BaseController;
use App\Libraries\Core\Response;
use App\Models\ScheduleModel;

class ScheduleController extends BaseController
{
    private $scheduleModel;
    public function __construct()
    {
        $this->scheduleModel = $this->model(new ScheduleModel());
    }

    public function showScheduleForTeam($teamId)
    {
        $future = [];
        if ($this->scheduleModel->selectTeamExistInSchedule($teamId) > 0){
            $future = $this->scheduleModel->selectFutureScheduleForTeam($teamId);
        }
        else{
            $future = $this->scheduleModel->selectFutureSchedule($teamId);
        }
        $schedule = $this->scheduleModel->selectCurrentScheduleForTeam($teamId);

        return new Response('home/schedulePage', [
            "schedule" => $schedule,
            "future" => $future
        ]);
    }
}