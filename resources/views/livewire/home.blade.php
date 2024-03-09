<div class="flex h-full w-full flex-col items-center justify-center gap-5">
    <img class="w-64 filter"
        src="{{ Vite::asset('resources/images/urna-eletronica.jpeg') }}"
        alt="">
    <h1 class="font-sans text-6xl font-bold drop-shadow">{{ config('app.name') }}</h1>
    <h2 class="font-mono font-normal drop-shadow">@lang('um olhar atento sobre o processo eleitoral, em números')</h2>
    <div class="flex items-center justify-between gap-5 font-mono font-normal drop-shadow">
        <div>
            <label for="">ano:</label>
            <select name=""
                id="">
                <option value="1">2024</option>
            </select>
        </div>
        <div>
            <label for="">cidade:</label>
            <select name=""
                id="">
                <option value="1">Jundiaí</option>
            </select>
        </div>
        <button
            class="bg-black px-4 py-1 text-white drop-shadow transition-all duration-150 hover:font-bold hover:shadow-md">entrar</button>
    </div>
</div>
