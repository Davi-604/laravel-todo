<section class="text-center">
    <h1 class="mt-5 text-3xl font-bold">Cadastro</h1>
    <form method="POST" class="mx-auto mt-10 max-w-3xl" action="{{ route('auth.singup_action') }}">
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
            'label' => 'Nome',
            'name' => 'name',
            'placeholder' => 'Digite o seu nome',
            'required' => true,
            'value' => old('name') ?? '',
            'error' => $errors->has('name') ? true : '',
        ])
        @include('components.auth.input', [
            'label' => 'Email',
            'name' => 'email',
            'placeholder' => 'Digite o seu email',
            'type' => 'email',
            'required' => true,
            'value' => old('email') ?? '',
            'error' => !empty(session('error')) ? true : '',
        ])
        @include('components.auth.input', [
            'label' => 'Senha',
            'name' => 'password',
            'placeholder' => 'Digite a sua senha',
            'type' => 'password',
            'required' => true,
            'value' => old('password') ?? '',
            'error' => $errors->has('password') ? true : '',
        ])
        @include('components.auth.input', [
            'label' => 'Confirme a Senha',
            'name' => 'password_confirmation',
            'placeholder' => 'Confirme a sua senha',
            'type' => 'password',
            'required' => true,
            'value' => old('password_confirmation') ?? '',
            'error' => $errors->has('password_confirmation') ? true : '',
        ])

        <div class="mb-10 flex flex-1 items-center justify-center">
            @include('components.default.linkBtn', [
                'label' => 'Voltar',
                'url' => 'auth.singin',
            ])
            @include('components.auth.submitBtn', [
                'label' => 'Salvar Dados',
                'filled' => true,
            ])
        </div>
    </form>
</section>
