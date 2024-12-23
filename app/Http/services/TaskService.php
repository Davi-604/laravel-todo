<?php

namespace App\Http\Services;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

class TaskService
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getTasks(int $userId, string $filteredDate)
    {

        $tasks = Task::where('user_id', $userId)
            ->whereDate('due_date', $filteredDate)
            ->orderBy('due_date', 'asc')
            ->get();

        return $tasks;
    }

    public function getOneTask(int $userId, int $id)
    {
        $task = Task::where('user_id', $userId)->find($id);

        return $task;
    }

    public function createTask(int $userId, array $data)
    {
        $user = $this->userService->getOneUser($userId);

        if ($user) {
            $data['user_id'] = $user->id;

            $newTask = Task::create($data);
            return $newTask;
        }

        return false;
    }

    public function updateTask(int $userId, int $id, array $data)
    {
        $task = $this->getOneTask($userId, $id);

        if (isset($task)) {
            $task->update($data);

            return $task;
        }

        return false;
    }

    public function deleteTask(int $userId, int $id)
    {

        $task = $this->getOneTask($userId, $id);
        if ($task) {
            $task->delete();
            return $task;
        }

        return false;
    }
}
