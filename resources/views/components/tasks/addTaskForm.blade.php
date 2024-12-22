<section class="text-center">
    <h1 class="mt-5 text-3xl font-bold">Criar Tarefa</h1>
    <form method="POST" class="mx-auto mt-10 max-w-3xl" action="{{ route('task.store') }}">
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
            'placeholder' => 'Digite o título da sua tarefa',
            'required' => true,
            'value' => old('title') ?? '',
            'error' => $errors->has('title') ? true : '',
        ])
        @include('components.auth.input', [
            'label' => 'Data de conclusão',
            'name' => 'due_date',
            'type' => 'datetime-local',
            'required' => true,
            'value' => old('due_date') ?? '',
            'error' => $errors->has('due_date') ? true : '',
        ])
        <div class="my-10">
            <label>
                <div class="my-2 text-left text-lg font-semibold">Categoria</div>
                <select required name="category_id"
                    class="w-full rounded-lg border-2 border-transparent bg-indigo-900 p-3 text-left text-lg outline-none transition-colors ease-in-out focus:border-white">
                    <option selected disabled value=''>Selecione a categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                <div class="mt-5 text-left">
                    @include('components.default.linkBtn', [
                        'label' => 'Nova categoria',
                        'icon' => 'fa-solid fa-arrow-right',
                        'url' => 'category.create',
                        'filled' => true,
                        'small' => true,
                    ])
                </div>
            </label>
        </div>
        <div class="my-10">
            <label>
                <div class="my-2 text-left text-lg font-semibold">Descrição</div>
                <textarea name="description"
                    class="h-[200px] w-full rounded-lg border-2 border-transparent bg-indigo-900 p-3 text-left text-lg outline-none transition-colors ease-in-out focus:border-white">{{ old('description') ?? '' }}</textarea>
            </label>
        </div>
        <div class="mb-10">
            @include('components.default.linkBtn', [
                'label' => 'Voltar',
                'url' => 'home',
            ])
            @include('components.auth.submitBtn', [
                'label' => 'Criar Tarefa',
                'filled' => true,
            ])
        </div>
    </form>
</section>
