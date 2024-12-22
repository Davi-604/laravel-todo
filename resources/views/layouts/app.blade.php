<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
    @vite('resources/css/app.css')

    <title>{{ $page ?? 'To-do' }}</title>
</head>

<body class="max-w-screen h-full overflow-x-hidden bg-indigo-950 text-white">
    <div class="flex">
        <div class="hidden lg:block">
            @include('components.sidebar')
        </div>
        <div class="flex-1">
            <nav class="flex h-[80px] w-full items-center bg-indigo-700 px-3 lg:h-[90px] lg:px-10">
                @if (View::hasSection('menuBtn'))
                    <div class="flex h-full flex-1 items-center justify-between gap-5">
                        <div class="fa-regular fa-circle-check fa-3x lg:hidden"></div>
                        <p class="text-2xl font-semibold lg:text-3xl">
                            {{ $headerTitle }}
                        </p>
                        <div id="menu_btn"
                            class="fa-solid fa-bars fa-2x cursor-pointer rounded-full p-2 transition-colors active:bg-indigo-900 lg:hidden">
                        </div>
                    </div>
                @else
                    <div class="flex h-full flex-1 items-center gap-5">
                        <div class="fa-regular fa-circle-check fa-3x lg:hidden"></div>
                        <p class="text-2xl font-semibold lg:text-3xl">
                            {{ $headerTitle }}
                        </p>
                    </div>
                @endif

                <div class="hidden flex-1 items-center justify-end gap-5 lg:flex">
                    @yield('headerBtn')
                </div>
            </nav>
            <main class="p-5">
                @yield('content')
            </main>
        </div>
    </div>
    <div id="menu_backdrop" class="fixed inset-0 hidden bg-black/50"></div>

    <div id="menu"
        class="absolute right-0 top-0 hidden h-full w-2/3 translate-x-full transform flex-col gap-5 bg-black/90 p-2 pt-10 opacity-0 transition-transform duration-300 ease-in-out">
        <i id="close_menu_btn"
            class="fa-solid fa-x fixed right-4 top-4 rounded-full p-2 transition-all ease-in active:bg-white/20"></i>
        <div class="mb-3 text-center text-2xl font-bold">Menu</div>
        @yield('menuBtn')
    </div>
</body>



<script type="text/javascript">
    window.config = {
        base_url: "{{ asset('') }}",
        csrf_token: "{{ csrf_token() }}"
    };
</script>
<script type="text/javascript" src="{{ asset('assets/js/default.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/tasks.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/graph.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/colorPicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/pikaDay.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/confirmDelete.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>

</html>
