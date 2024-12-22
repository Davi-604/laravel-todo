@extends('layouts.app', [
    'headerTitle' => 'Suas categorias',
])

@section('headerBtn')
    @include('components.default.linkBtn', [
        'label' => 'Voltar',
        'icon' => 'fa-solid fa-circle-arrow-left',
        'url' => 'category.index',
        'filled' => true,
    ])
@endsection

@section('content')
    @include('components.categories.editCategoryForm')
@endsection
