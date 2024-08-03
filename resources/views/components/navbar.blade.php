<nav class="bg-black px-5 py-2 font-mono text-white shadow-white drop-shadow">
    <ul class="flex justify-start gap-7">
        <li class="transition-all duration-150 hover:font-extrabold">
            <a wire:navigate href="{{ route('home-page') }}">início</a>
        </li>
        <li class="transition-all duration-150 hover:font-extrabold">
            <a wire:navigate href="{{ route('contribute') }}">contribua</a>
        </li>
        <li class="transition-all duration-150 hover:font-extrabold">
            <a wire:navigate href="{{ route('about') }}">sobre</a>
        </li>
    </ul>
</nav>
