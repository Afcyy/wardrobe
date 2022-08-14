<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=satoshi@900,700,500,300,400&display=swap">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />

    </head>
    <body class="font-satoshi antialiased">
        <div class="h-screen bg-gray-100">

            <header class="flex flex-row py-4 w-11/12 sm:flex-col break-words absolute left-1/2 transform -translate-x-1/2">
                <div class="w-full flex justify-between items-center">
                    <a href="{{ route('outfit.index') }}"><h1 class="text-xl text-blue-500 font-bold">Peacedrobe</h1></a>
                    <form action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="bg-red-500 text-white text-sm rounded-md py-2 px-4 hover:bg-red-400">Log out</button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="w-full h-full">
                <div id="successAlert"
                     class="bg-green-400 rounded-md w-fit absolute top-5 right-10 border border-green-700
                     @if(session()->has('success')) visible @else invisible @endif">
                    <p class="text-white px-6 py-2">{{ session()->pull('success') }}</p>
                </div>
                @if(session()->has('error'))
                    <div class="bg-red-500 rounded-md w-fit absolute top-5 right-10 border-2 border-red-700">
                        <p class="text-white px-6 pt-2">Please fix errors below:</p>
                        <ul class="list-disc py-2">
                            @foreach(array_values(session()->pull('error')) as $error)
                                <li class="text-white text-sm mx-14 py-2">{{ $error[0] }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex justify-center items-center mx-auto sm:px-6 lg:px-8 h-screen">
                    {{ $slot }}
                </div>
            </main>
        </div>

        <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
        <script>
            feather.replace();

            setTimeout("document.getElementById('successAlert').classList.add('invisible')", 5000);
        </script>
    </body>
</html>
