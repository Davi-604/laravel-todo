<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;
use App\Http\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $taskService;

    public function __construct(CategoryService $categoryService, TaskService $taskService)
    {
        $this->categoryService = $categoryService;
        $this->taskService = $taskService;
    }

    public function index(Request $req)
    {
        $categories = $this->categoryService->getCategories($req->user()->id);

        return view('categories', [
            'categories' => $categories
        ]);
    }

    public function create(Request $req)
    {
        return view('newCategory');
    }
    public function store(Request $req)
    {
        $data = $req->only(['title', 'color']);
        $errorMessages = [
            'title.required' => 'O título é obrigatório',
            'title.min' => 'O título tem que ter no mínimo 4 caracteres',
            'color.required' => 'A cor é obrigatória',
        ];

        $validator = Validator::make($data, [
            'title' => 'required|min:4',
            'color' => 'required'
        ], $errorMessages);

        if ($validator->fails()) {
            return redirect()->route('category.create')
                ->withErrors($validator)
                ->withInput();
        }

        $res = $this->categoryService->createCategory($req->user()->id, $data);
        if ($res) {
            return \redirect(route('category.index'));
        }

        return \redirect(route('category.create'))
            ->with('error', 'Um erro desconhecido ocorreu...')
            ->withInput();
    }

    public function edit(Request $req)
    {
        $id = \intval($req->id);

        $category = $this->categoryService->getOneCategory($req->user()->id, $id);

        return view('editCategory', [
            'category' => $category
        ]);
    }
    public function update(Request $req)
    {
        $id = \intval($req->id);

        $data = $req->only(['title', 'color']);
        $errorMessages = [
            'title.required' => 'O título é obrigatório',
            'title.min' => 'O título tem que ter no mínimo 4 caracteres',
            'color.required' => 'A cor é obrigatória',
        ];

        $validator = Validator::make($data, [
            'title' => 'required|min:4',
            'color' => 'required'
        ], $errorMessages);

        if ($validator->fails()) {
            return redirect()->route('category.edit', ['id' => $id])
                ->withErrors($validator);
        }

        $updatedTask = $this->categoryService->updateCategory($req->user()->id, $id, $data);

        if ($updatedTask) {
            return \redirect(route('category.index'));
        }

        return \redirect(route('category.edit', ['id' => $id]))
            ->with('error', 'Um erro desconhecido ocorreu...')
            ->withInput();
    }

    public function delete(Request $req)
    {
        $id = \intval($req->id);

        $deletedCategory = $this->categoryService->deleteCategory($req->user()->id, $id);

        if ($deletedCategory === false) {
            return \redirect(route('category.index'));
        }

        return \redirect(route('category.index'));
    }
}
