<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>@yield('title', 'Default Title')</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="relative min-h-screen bg-gradient-to-br from-sky-500 via-cyan-500 to-blue-500">
    @extends('layouts.header')
    <div class="container mx-auto pt-10 flex flex-col items-center">
        @yield('body')
    </div>
    @extends('layouts.footer')

</body>

</html>
