<x-layouts.app :title="'sobre | ' . config('app.name')">
    <div class="flex h-full w-full flex-col items-center justify-center gap-12"">
        <section class="flex flex-col items-center gap-4">
            <h1 class="text-4xl font-bold underline drop-shadow-sm">autor</h1>
            <h2 class="text-3xl font-bold drop-shadow-sm">Eduardo Pessine</h2>
            <p class="max-w-md text-center text-xl drop-shadow-sm">desenvolvedor fullstack PHP, Golang e JS, liderando
                projetos open-source no ecossistema Laravel</p>
            <div>
                <a target="_blank" class="text-blue-600 underline" href="https://linkedin.com/in/epessine">linkedin</a> |
                <a target="_blank" class="text-blue-600 underline" href="https://github.com/epessine">github</a>
            </div>
        </section>

        <section class="flex flex-col items-center gap-4">
            <h1 class="text-4xl font-bold underline drop-shadow-sm">bibliotecas</h1>
            <h2 class="text-3xl font-bold drop-shadow-sm">Axis</h2>
            <p class="max-w-md text-center text-xl drop-shadow-sm">crie gráficos de forma simples e rápida em aplicações
                Laravel</p>
            <div>
                <a target="_blank" class="text-blue-600 underline" href="https://epessine.github.io/axis/">docs</a> |
                <a target="_blank" class="text-blue-600 underline" href="https://github.com/epessine/axis">github</a>
            </div>
            <h2 class="mt-2 text-3xl font-bold drop-shadow-sm">Livewire</h2>
            <p class="max-w-md text-center text-xl drop-shadow-sm">framework fullstack para aplicações Laravel reativas
            </p>
            <div>
                <a target="_blank" class="text-blue-600 underline" href="https://livewire.laravel.com/">docs</a> |
                <a target="_blank" class="text-blue-600 underline"
                   href="https://github.com/livewire/livewire">github</a>
            </div>
        </section>
    </div>
</x-layouts.app>
