@extends('layouts.app', [
    'headerTitle' => 'Olá ' . $user->name . '!',
])

@section('headerBtn')
    @include('components.default.linkBtn', [
        'label' => 'Minhas categorias',
        'icon' => 'fa-solid fa-layer-group',
        'url' => 'category.index',
        'filled' => true,
    ])
    @include('components.default.linkBtn', [
        'label' => 'Adicionar tarefa',
        'icon' => 'fa-solid fa-plus',
        'url' => 'task.create',
        'filled' => true,
    ])
    @include('components.default.linkBtn', [
        'label' => 'Sair',
        'icon' => 'fa-solid fa-door-open',
        'url' => 'auth.logout',
    ])
@endsection

@section('menuBtn')
    @include('components.default.linkBtn', [
        'label' => 'Minhas categorias',
        'icon' => 'fa-solid fa-layer-group',
        'iconLeftSide' => true,
        'url' => 'category.index',
    ])
    @include('components.default.linkBtn', [
        'label' => 'Adicionar tarefa',
        'icon' => 'fa-solid fa-plus',
        'iconLeftSide' => true,
        'url' => 'task.create',
    ])
    @include('components.default.linkBtn', [
        'label' => 'Sair',
        'icon' => 'fa-solid fa-door-open',
        'iconLeftSide' => true,
        'url' => 'auth.logout',
    ])
@endsection

@section('content')
    <div class="flex h-full flex-col items-center lg:flex-row lg:items-start">
        @include('components.graph.graphArea')
        @include('components.tasks.taskArea')
    </div>
@endsection
