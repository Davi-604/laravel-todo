<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')

    <title>{{ $page ?? 'To-do' }}</title>
</head>

<body class="min-w-screen h-full overflow-x-hidden bg-indigo-950 text-white">
    <div class="flex">
        <div class="hidden lg:block">
            @include('components.sidebar')
        </div>
        <div class="flex-1">
            <nav class="flex h-[80px] w-full items-center bg-indigo-700 px-3 lg:h-[90px] lg:px-10">
                <div class="flex h-full flex-1 items-center justify-center lg:justify-start">
                    <p class="text-xl font-semibold md:text-2xl lg:text-3xl">
                        {{ $headerTitle }}
                    </p>
                </div>

                <div class="hidden flex-1 items-center justify-end gap-5 lg:flex">
                    @yield('headerBtn')
                </div>
            </nav>
            <main class="p-5">
                @yield('content')
                <div class="mx-auto flex justify-center lg:hidden">
                    @yield('routeBtn')
                </div>
            </main>
        </div>
    </div>
</body>



<script type="text/javascript">
    window.config = {
        base_url: "{{ asset('') }}",
        csrf_token: "{{ csrf_token() }}"
    };
</script>
<script type="text/javascript" src="{{ asset('assets/js/default.js') }}"></script>

</html>
