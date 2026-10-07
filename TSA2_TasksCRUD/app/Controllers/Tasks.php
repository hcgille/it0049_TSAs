<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    public function today()
    {
        $taskModel = new TaskModel();

        return view('tasks/today', [
            'pageTitle' => 'Today',
            'tasks' => $taskModel
                ->where('task_date', date('Y-m-d'))
                ->where('is_archived', 0)
                ->orderBy('id', 'ASC')
                ->findAll(),
        ]);
    }

    public function index()
    {
        $taskModel = new TaskModel();

        return view('tasks/index', [
            'pageTitle' => 'All Tasks',
            'tasks' => $taskModel
                ->where('is_archived', 0)
                ->orderBy('task_date', 'ASC')
                ->orderBy('id', 'ASC')
                ->findAll(),
        ]);
    }

    public function new()
    {
        return view('tasks/new', [
            'pageTitle' => 'New Task',
        ]);
    }

    public function create()
    {
        if (! $this->request->is('post')) {
            return $this->response
                ->setStatusCode(405)
                ->setBody('Method Not Allowed');
        }

        $taskModel = new TaskModel();

        $data = [
            'title' => trim((string) $this->request->getPost('title')),
            'status' => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
            'is_archived' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if (! $taskModel->insert($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $taskModel->errors());
        }

        return redirect()
            ->to(site_url('tasks'))
            ->with('success', 'Task created successfully.');
    }

    public function edit(int $id)
    {
        $task = $this->findActiveTask($id);

        return view('tasks/edit', [
            'pageTitle' => 'Edit Task',
            'task' => $task,
        ]);
    }

    public function update(int $id)
    {
        if (! $this->request->is('post')) {
            return $this->response
                ->setStatusCode(405)
                ->setBody('Method Not Allowed');
        }

        $this->findActiveTask($id);

        $taskModel = new TaskModel();

        $data = [
            'title' => trim((string) $this->request->getPost('title')),
            'status' => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
        ];

        if (! $taskModel->update($id, $data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $taskModel->errors());
        }

        return redirect()
            ->to(site_url('tasks'))
            ->with('success', 'Task updated successfully.');
    }

    public function delete(int $id)
    {
        if (! $this->request->is('post')) {
            return $this->response
                ->setStatusCode(405)
                ->setBody('Method Not Allowed');
        }

        $this->findActiveTask($id);

        $taskModel = new TaskModel();

        $taskModel->update($id, [
            'is_archived' => 1,
        ]);

        return redirect()
            ->to(site_url('tasks'))
            ->with('success', 'Task archived successfully.');
    }

    private function findActiveTask(int $id): array
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('id', $id)
            ->where('is_archived', 0)
            ->first();

        if (! $task) {
            throw PageNotFoundException::forPageNotFound(
                'The requested task was not found.'
            );
        }

        return $task;
    }
}