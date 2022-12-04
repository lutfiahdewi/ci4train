<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title'=>" Train Scheduler"
        ];
        echo view('train/main', $data);
    }
    
    public function signup()
    {
        $data = [
            'title'=>" Sign Up || Train Scheduler"
        ];
        echo view('train/signup', $data);
    }
}
