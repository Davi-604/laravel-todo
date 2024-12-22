<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;
use App\Http\Services\TaskService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    protected $categoryService;
    protected $taskService;

    public function __construct(CategoryService $categoryService, TaskService $taskService)
    {
        $this->categoryService = $categoryService;
        $this->taskService = $taskService;
    }

    public function create(Request $req)
    {
        $categories = $this->categoryService->getCategories($req->user()->id);

        return view('newTask', [
            'categories' => $categories
        ]);
    }
    public function store(Request $req)
    {
        $data = $req->only(['title', 'due_date', 'category_id', 'description']);

        $errorMessages = [
            'title.required' => 'O título é obrigatório',
            'title.min' => 'O título deve conter no mínimo 4 caracteres',
            'due_date.required' => 'Defina uma data para a sua tarefa',
            'due_date.date_format' => 'Formato da data inválido',
            'due_date.after_or_equal' => 'Escolha a data correspondente a hoje',
            'description.max' => 'A descrição deve ter no máximo 100 caracteres',
        ];

        $validator = Validator::make($data, [
            'title' => 'required|min:4',
            'due_date' => 'required|date_format:Y-m-d\TH:i|after_or_equal:today',
            'description' => 'nullable|max:100',
        ], $errorMessages);

        if ($validator->fails()) {
            return redirect()->route('task.create')
                ->withErrors($validator)
                ->withInput();
        }

        $res = $this->taskService->createTask($req->user()->id, $data);

        if ($res) {
            return \redirect(route('home'));
        }

        return \redirect(route('task.create'))
            ->with('error', 'Um erro desconhecido ocorreu...')
            ->withInput();
    }

    public function edit(Request $req)
    {
        $id = \intval($req->id);
        $task = $this->taskService->getOneTask($req->user()->id, $id);
        $task->due_date = Carbon::parse($task->due_date)->format('Y-m-d\TH:i');

        if (!isset($task)) {
            return \redirect(route('home'));
            exit;
        }

        $categories = $this->categoryService->getCategories($req->user()->id);

        return view('editTask', [
            'task' => $task,
            'categories' => $categories
        ]);
    }
    public function update(Request $req)
    {
        $id = \intval($req->id);

        $data = $req->only(['title', 'due_date', 'category_id', 'description', 'is_done']);
        $errorMessages = [
            'title.required' => 'O título é obrigatório',
            'title.min' => 'O título deve conter no mínimo 4 caracteres',
            'due_date.required' => 'Defina uma data para a sua tarefa',
            'due_date.date_format' => 'Formato da data inválido',
            'due_date.after_or_equal' => 'Escolha a data correspondente a hoje',
            'description.max' => 'A descrição deve ter no máximo 100 caracteres',
        ];

        $validator = Validator::make($data, [
            'title' => 'required|min:4',
            'due_date' => 'required|date_format:Y-m-d\TH:i|after_or_equal:today',
            'description' => 'nullable|max:100',
        ], $errorMessages);

        if ($validator->fails()) {
            return redirect()->route('task.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $updatedTask = $this->taskService->updateTask($req->user()->id, $id, $data);

        if ($updatedTask) {
            return \redirect(route('home'));
        }

        return \redirect(route('category.edit', ['id' => $id]))
            ->with('error', 'Um erro desconhecido ocorreu...')
            ->withInput();
    }

    public function delete(Request $req)
    {
        $id = \intval($req->id);

        $deletedTask = $this->taskService->deleteTask($req->user()->id, $id);

        if ($deletedTask) {
            return \redirect(route('home'));
        }

        return \redirect(route('home'));
    }
}
