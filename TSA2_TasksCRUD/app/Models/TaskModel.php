<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'title',
        'status',
        'task_date',
        'is_archived',
        'created_at',
    ];

    protected $validationRules = [
        'title' => 'required|max_length[150]',
        'task_date' => 'required|valid_date[Y-m-d]',
        'status' => 'required|in_list[pending,in progress,completed]',
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'The task title is required.',
            'max_length' => 'The task title cannot exceed 150 characters.',
        ],
        'task_date' => [
            'required' => 'The task date is required.',
            'valid_date' => 'Please enter a valid task date.',
        ],
        'status' => [
            'required' => 'Please select a task status.',
            'in_list' => 'Please select a valid task status.',
        ],
    ];
}