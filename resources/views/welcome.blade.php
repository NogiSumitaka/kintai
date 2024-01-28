<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>勤怠報告アプリ</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-100">
        <div class="flex items-center justify-center h-screen">
            <div class="flex flex-col items-center p-4 rounded-md bg-white shadow">
                <h1 class="text-2xl font-bold">勤怠管理ログイン</h1>
                <div class="flex justify-center my-5">
                    <a href="{{ route('login') }}" class="px-6 py-2 m-3 bg-white border border-gray-400 hover:border-gray-800 hover:shadow text-xl">管理者</a>
                    <a href="{{ route('login') }}" class="px-6 py-2 m-3 bg-white border border-gray-400 hover:border-gray-800 hover:shadow text-xl">従業員</a>
                </div>
                <p class="underline my-3">新規登録は<a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-800">こちら</a></p>
            </div>
        </div>
        
    </body>
</html>
