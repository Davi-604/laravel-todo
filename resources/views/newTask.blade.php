@extends('layouts.app', [
    'headerTitle' => 'Crie uma nova tarefa',
])

@section('headerBtn')
    @include('components.default.linkBtn', [
        'label' => 'Voltar',
        'icon' => 'fa-solid fa-circle-arrow-left',
        'url' => 'home',
        'filled' => true,
    ])
@endsection

@section('content')
    @include('components.tasks.addTaskForm')
@endsection
