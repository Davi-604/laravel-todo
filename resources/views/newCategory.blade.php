@extends('layouts.app', [
    'headerTitle' => 'Suas categorias',
])

@section('headerBtn')
    @include('components.default.linkBtn', [
        'label' => 'Voltar',
        'icon' => 'fa-solid fa-circle-arrow-left',
        'filled' => true,
    ])
@endsection

@section('content')
    @include('components.categories.addCategoryForm')
@endsection
