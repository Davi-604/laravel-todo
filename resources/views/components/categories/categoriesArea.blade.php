<div class="mx-auto max-w-lg text-center">
    <h1 class="mt-5 text-3xl font-bold">Suas categorias</h1>
    <div class="mt-10">
        @foreach ($categories as $category)
            @include('components.categories.categoryItem', [
                'id' => $category->id,
                'title' => $category->title,
                'color' => $category->color,
            ])
        @endforeach
    </div>
    <div class="mt-10 flex h-full items-center justify-center gap-3 lg:hidden">
        @include('components.default.linkBtn', [
            'label' => 'Voltar',
            'url' => 'home',
        ])
        @include('components.default.linkBtn', [
            'label' => 'Adicionar categoria',
            'icon' => 'fa-solid fa-plus',
            'url' => 'category.create',
            'filled' => true,
        ])
    </div>
</div>
