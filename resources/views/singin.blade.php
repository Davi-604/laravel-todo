@extends('layouts.auth', [
    'page' => 'Login',
    'headerTitle' => 'Faça o seu login!',
])

@section('headerBtn')
    @include('components.default.linkBtn', [
        'label' => 'Não tem conta? Cadastre-se',
        'icon' => 'fa-solid fa-user-plus',
        'url' => 'auth.singup',
        'filled' => true,
    ])
@endsection

@section('routeBtn')
    @include('components.default.linkBtn', [
        'label' => 'Não tem conta? Cadastre-se',
        'icon' => 'fa-solid fa-user-plus',
        'url' => 'auth.singup',
        'filled' => true,
    ])
@endsection

@section('content')
    @include('components.auth.singinForm')
@endsection
