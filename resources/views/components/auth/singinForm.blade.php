<section class="text-center">
    <h1 class="mt-5 text-3xl font-bold">Login</h1>
    <form method="POST" class="mx-auto mt-10 max-w-3xl" action="{{ route('auth.singin_action') }}">
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
            'label' => 'Email',
            'name' => 'email',
            'placeholder' => 'Digite o seu email',
            'type' => 'email',
            'required' => true,
            'value' => old('email') ?? '',
            'error' => $errors->has('email') ? true : '',
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

        <div class="mb-10">
            @include('components.auth.submitBtn', [
                'label' => 'Enviar Dados',
                'filled' => true,
            ])
        </div>
    </form>
</section>
