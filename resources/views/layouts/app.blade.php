<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Uncomment every commit --}}
        {{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1238862160037544" crossorigin="anonymous"></script>  --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
            .container {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            main {
                flex: 1;
            }

            footer {
                padding-top: 16px;
                background-color: rgb(230, 230, 230, 1);;
                padding-bottom: 16px;
            }

            .font-game {
                font-family: 'Press Start 2P', cursive;
            }

            .background-game-color {
                background-image: url({{ asset('images/space-sky.png') }});
            }

            .font-small-small {
                font-size: .6rem
            }

            .font-small {
                font-size: .7rem
            }

            .font-medium {
                font-size: .8rem
            }

            .font-big {
                font-size: 1.25rem
            }

            .align-center {
                text-align: center;
            }

            .margin-auto {
                margin: auto;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    </head>
    <body class="font-sans antialiased font-game">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 container background-game-color">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex items-center justify-center">
                {{ $slot }}
            </main>

            <!-- Page Footer -->
            <footer>
                @include('layouts.footer')
            </footer>
        </div>
    </body>
</html>

<script>
    $('form').submit(function(){
        $('button').prop('disabled', true);
    })
</script>