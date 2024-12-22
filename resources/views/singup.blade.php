@extends('layouts.auth', [
    'page' => 'Login',
    'headerTitle' => 'Cadastre-se para continuar!',
])

@section('headerBtn')
    @include('components.default.linkBtn', [
        'label' => 'Já tem conta? Faça login',
        'icon' => 'fa-regular fa-user',
        'url' => 'auth.singin',
        'filled' => true,
    ])
@endsection
@section('routeBtn')
    @include('components.default.linkBtn', [
        'label' => 'Já tem conta? Faça login',
        'icon' => 'fa-regular fa-user',
        'url' => 'auth.singin',
        'filled' => true,
    ])
@endsection

@section('content')
    @include('components.auth.singupForm')
@endsection
