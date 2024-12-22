<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\TaskService;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $req)
    {
        $date = Carbon::today()->toDateString();

        if ($req->date) {
            $date = $req->date;
        }

        $carbonDate = Carbon::createFromDate($date);

        $currentDate = $carbonDate->translatedFormat('d \d\e M');
        $prevDate = $carbonDate->addDay(-1)->format('Y-m-d');
        $nextDate = $carbonDate->addDay(2)->format('Y-m-d');

        $dateData = [
            'currentDate' => $currentDate,
            'prevDate' => $prevDate,
            'nextDate' => $nextDate,
        ];

        $tasks = $this->taskService->getTasks($req->user()->id, $date);

        return \view('home', [
            'tasks' => $tasks,
            'user' => $req->user(),
            'dateData' => $dateData
        ]);
    }
}
