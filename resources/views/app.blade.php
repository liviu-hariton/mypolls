<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Livewire Poll</title>

    @vite(['resources/js/app.js'])

    @livewireStyles
</head>

<body class="container">
    @livewireScripts

    @livewire('create-poll')

    <hr />

    @livewire('polls')
</body>
</html>
