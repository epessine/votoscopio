<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        Chart.defaults.font.family = "Victor Mono";
        Chart.defaults.color = '#000';
        Chart.defaults.plugins.legend.labels.usePointStyle = true;
        Chart.defaults.plugins.legend.labels.padding = 18;
        Chart.defaults.layout.padding = 0;
    </script>
</head>

<body class="flex h-screen flex-col font-sans font-normal">
    <x-navbar />
    <main class="flex-1">
        {{ $slot }}
    </main>
</body>

</html>
