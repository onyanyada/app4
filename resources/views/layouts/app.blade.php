<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>

            $(".write-btn").click(function () {
                $(".left-area").show();
            });

        // 各 book-item をクリックしたときに、その詳細を表示
        $(".book-item").click(function () {
            // 他の book-detail をすべて非表示にする
            // $(".book-detail").hide();

            // クリックされた book-item 内の詳細を表示する
            $(this).find(".book-detail").show();
        });

        // 閉じるボタンをクリックしたら詳細を非表示
        $(document).on("click", ".close-btn", function (e) {
            e.stopPropagation();  // 親のクリックイベントを無効化
            $(this).closest(".book-detail").hide();
        });
        </script>
    </body>
</html>
