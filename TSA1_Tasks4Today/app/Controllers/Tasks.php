<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function today()
    {
        $taskModel = new TaskModel();

        $data = [
            'pageTitle' => 'Today',
            'tasks' => $taskModel
                ->where('task_date', date('Y-m-d'))
                ->orderBy('id', 'ASC')
                ->findAll(),
        ];

        return view('tasks/today', $data);
    }

    public function index()
    {
        $taskModel = new TaskModel();

        $data = [
            'pageTitle' => 'All Tasks',
            'tasks' => $taskModel
                ->orderBy('task_date', 'ASC')
                ->orderBy('id', 'ASC')
                ->findAll(),
        ];

        return view('tasks/index', $data);
    }
}