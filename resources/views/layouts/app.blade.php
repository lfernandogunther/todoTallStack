<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Tall Stack</title>
    @wireUiScripts
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles
</head>
<body class="soft-scrollbar">
    <x-notifications position="bottom-left" />

    {{ $slot }}
    @livewireScripts
</body>
</html>
