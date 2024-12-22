<?php

namespace App\Http\Services;

use App\Models\Category;

class CategoryService
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getCategories(int $userId)
    {
        $categories = Category::where('user_id', $userId)->get();

        return $categories;
    }
    public function getOneCategory(int $userId, int $id)
    {
        $categories = Category::where('user_id', $userId)->find($id);

        return $categories;
    }

    public function createCategory(int $userId, array $data)
    {
        $user = $this->userService->getOneUser($userId);

        if ($user) {
            $data['user_id'] = $userId;
            $newCategory = Category::create($data);

            if (!isset($newCategory)) {
                return false;
                exit;
            }

            return true;
        }

        return false;
    }

    public function createDefaultCategories(int $userId)
    {
        $defaultCategories = Category::insert([
            ['title' => 'Urgente', 'color' => '#F21212', 'user_id' => $userId],
            ['title' => 'Importante', 'color' => '#F7D13B', 'user_id' => $userId],
            ['title' => 'Tranquila', 'color' => '#43B8F3', 'user_id' => $userId],
        ]);

        if (isset($defaultCategories)) {
            return true;
            exit;
        }

        return false;
    }

    public function updateCategory(int $userId, int $id, array $data)
    {
        $category = $this->getOneCategory($userId, $id);

        if (isset($category)) {
            $category->update($data);

            return true;
        }

        return false;
    }

    public function deleteCategory(int $userId, int $id)
    {
        $category = $this->getOneCategory($userId, $id);

        if (isset($category)) {
            $category->delete();
            return true;
        }


        return false;
    }
}
