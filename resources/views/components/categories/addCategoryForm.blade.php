<section class="text-center">
    <h1 class="mt-5 text-3xl font-bold">Criar Categoria</h1>
    <form method="POST" class="mx-auto mt-10 max-w-3xl" action="{{ route('category.store') }}">
        @csrf

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @include('components.auth.errorAlert', [
                    'error' => $error,
                ])
            @endforeach
        @endif
        @if (!empty(session('error')))
            @include('components.auth.errorAlert', [
                'error' => session('error'),
            ])
        @endif

        @include('components.auth.input', [
            'label' => 'Título',
            'name' => 'title',
            'placeholder' => 'Digite o título da sua categoria',
            'required' => true,
            'value' => old('title') ?? '',
            'error' => $errors->has('title') ? true : '',
        ])
        <div class="my-10">
            <label>
                <div class="my-2 text-left text-lg font-semibold">Cor da categoria</div>
                <div style="max-width: 10px;">
                    <div id="color-picker" class="h-10 w-10 cursor-pointer rounded-full"></div>
                    <input type="hidden" name="color" id="color-input" value="#F00" />
                </div>
            </label>
        </div>

        <div class="mb-10 flex items-center justify-center">
            @include('components.default.linkBtn', [
                'label' => 'Voltar',
                'url' => 'category.index',
            ])
            @include('components.auth.submitBtn', [
                'label' => 'Criar',
                'filled' => true,
            ])
        </div>
    </form>
</section>
