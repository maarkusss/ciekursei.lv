<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Title --}}
    <title>@yield('title')</title>
    {{-- CSRF token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Favicon --}}
    <link rel="shortcut icon" href="/favicon.png">
    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{-- Flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/4.20.0/full-all/ckeditor.js"></script>
</head>

<body class="font-sans">
    <div class="flex flex-col w-full min-h-screen bg-primary-normal/20 lg:pl-56">
        <div class="flex flex-row flex-1 h-full">
            {{-- Content box --}}
            <div class="flex flex-col items-start justify-start w-full min-h-full p-4 bg-transparent">
                @include('admincp.components.infobox')
                @auth
                    @include('admincp.components.sidebar')
                @endauth
                @yield('content')
            </div>
        </div>
    </div>
    {{-- Scripts --}}
    @yield('javascript')
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
