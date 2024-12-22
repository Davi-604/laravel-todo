@extends('layouts.app', [
    'headerTitle' => 'Suas categorias',
])

@section('headerBtn')
    @include('components.default.linkBtn', [
        'label' => 'Adicionar categoria',
        'icon' => 'fa-solid fa-plus',
        'url' => 'category.create',
        'filled' => true,
    ])
    @include('components.default.linkBtn', [
        'label' => 'Voltar',
        'url' => 'home',
        'icon' => 'fa-solid fa-circle-arrow-left',
        'filled' => true,
    ])
@endsection
@section('menuBtn')
    @include('components.default.linkBtn', [
        'label' => 'Adicionar categoria',
        'icon' => 'fa-solid fa-plus',
        'iconLeftSide' => true,
        'url' => 'category.create',
    ])
    @include('components.default.linkBtn', [
        'label' => 'Voltar',
        'url' => 'home',
        'icon' => 'fa-solid fa-circle-arrow-left',
        'iconLeftSide' => true,
    ])
@endsection

@section('content')
    @include('components.categories.categoriesArea')
@endsection
