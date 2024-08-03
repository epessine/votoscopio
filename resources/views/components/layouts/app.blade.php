<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        Chart.defaults.font.family = "Victor Mono";
        Chart.defaults.color = '#000';
        Chart.defaults.plugins.legend.labels.usePointStyle = true;
        Chart.defaults.plugins.legend.labels.padding = 18;
        Chart.defaults.layout.padding = 0;
        Chart.defaults.elements.line.tension = 0.25;
        Chart.defaults.elements.line.borderWidth = 2;
        Chart.defaults.elements.point.radius = 2.5;
        Chart.defaults.scale.ticks.display = false;
    </script>
</head>

<body class="flex h-screen flex-col font-sans font-normal">
    <x-navbar />
    <main class="flex-1">
        {{ $slot }}
    </main>
</body>

</html>
