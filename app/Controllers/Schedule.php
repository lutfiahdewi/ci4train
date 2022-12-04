<?php

namespace App\Controllers;

class Schedule extends BaseController
{
    public function index()
    {
        $data = [
            'title'=>"Index || Train Scheduler"
        ];
        echo view('train/schedule', $data);
    }
    

}
