<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{

    public function getOneUser(int $id)
    {
        $user = User::find($id);

        return $user;
    }
    public function getUserByEmail(string $email)
    {
        $user = User::where('email', $email)->first();

        if ($user) {
            return $user;
        }

        return false;
    }

    public function createUser($data)
    {
        $user = User::create($data);

        $categoryService = new CategoryService($this);
        $categoryService->createDefaultCategories($user->id);

        return $user;
    }

    public function updateUser(int $id, $data)
    {
        $user = $this->getOneUser($id);

        if (!isset($user)) {
            return false;
            exit;
        }

        $user->update($data);
        $user->save();

        return $user;
    }

    public function deleteUser(int $id)
    {
        $user = $this->getOneUser($id);

        if (!isset($user)) {
            return false;
            exit;
        }

        $user->delete();

        return true;
    }
}
