<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;
use App\Http\Services\TaskService;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $categoryService;
    protected $taskService;
    protected $userService;

    public function __construct(CategoryService $categoryService, TaskService $taskService, UserService $userService)
    {
        $this->categoryService = $categoryService;
        $this->taskService = $taskService;
        $this->userService = $userService;
    }

    public function singin()
    {
        if (Auth::check()) {
            return \redirect(route('home'));
        }
        return \view('singin');
    }
    public function singin_action(Request $req)
    {
        $data = $req->only(['email', 'password']);
        $errorMessages = [
            'email.required' => 'O campo de email é obrigatório',
            'email.email' => 'Email inválido',
            'password.required' => 'O campo de senha é obrigatório',
            'password.min' => 'O campo de senha deve ter no mínimo 3 caracteres',
        ];

        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ], $errorMessages);

        if ($validator->fails()) {
            return redirect()->route('auth.singin')
                ->withErrors($validator)
                ->withInput();
        }


        if (Auth::attempt($data)) {
            return \redirect(route('home'));
        };

        return \redirect(route('auth.singin'))
            ->with('error', 'Credenciais inválidas. Verifique seus dados e tente novamente.')
            ->withInput();
    }

    public function singup()
    {
        if (Auth::check()) {
            return \redirect(route('home'));
        }
        return \view('singup');
    }
    public function singup_action(Request $req)
    {
        $data = $req->only(['name', 'email', 'password', 'password_confirmation']);
        $errorMessages = [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome deve ter no mínimo 2 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 15 caracteres',
            'email.required' => 'O campo de email é obrigatório',
            'email.email' => 'Email inválido',
            'password.required' => 'O campo de senha é obrigatório',
            'password.min' => 'O campo de senha deve ter no mínimo 3 caracteres',
            'password.confirmed' => 'As senhas não batem'
        ];

        $validator = Validator::make($data, [
            'name' => 'required|min:2|max:15',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed'
        ], $errorMessages);

        if ($validator->fails()) {
            return redirect(route('auth.singup'))
                ->withErrors($validator)
                ->withInput();
        }

        $IsRegisteredUser = $this->userService->getUserByEmail($data['email']);

        if ($IsRegisteredUser  != false) {
            return \redirect(route('auth.singup'))
                ->with('error', 'Email já cadastrado. Insira outro')
                ->withInput();
        }

        $data['password'] = Hash::make($data['password']);
        $this->userService->createUser($data);

        return \redirect(route('auth.singin'));
    }

    public function logout()
    {
        Auth::logout();
        return \redirect(route('auth.singin'));
    }
}
