@extends('layouts.app', [
    'headerTitle' => 'Edite a sua tarefa',
])

@section('headerBtn')
    @include('components.default.linkBtn', [
        'label' => 'Minhas categorias',
        'icon' => 'fa-solid fa-layer-group',
        'url' => 'category.index',
        'filled' => true,
    ])
    @include('components.default.linkBtn', [
        'label' => 'Voltar',
        'icon' => 'fa-solid fa-circle-arrow-left',
        'url' => 'home',
        'filled' => true,
    ])
@endsection

@section('content')
    @include('components.tasks.editTaskForm')
@endsection
