<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\TaskService;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function update_task(Request $req)
    {
        $id = \intval($req->input('taskId'));

        $is_done = $req->input('isDone');
        $is_done = ['is_done' => $req->input('isDone')];


        $res = $this->taskService->updateTask($req->user()->id, $id, $is_done);

        if ($res) {
            return ['success' => true];
        }

        return ['success' => false];
    }
}
