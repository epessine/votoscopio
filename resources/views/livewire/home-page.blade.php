<div class="flex h-full w-full flex-col items-center justify-center gap-5">
    <img class="w-64 filter"
        src="{{ Vite::asset('resources/images/urna-eletronica.jpeg') }}"
        alt="">
    <h1 class="font-sans text-6xl font-bold drop-shadow">{{ config('app.name') }}</h1>
    <h2 class="font-mono font-normal drop-shadow">@lang('um olhar atento sobre o processo eleitoral, em números')</h2>
    <div class="flex items-center justify-between gap-5 font-mono font-normal drop-shadow">
        <div>
            <label for="year-select">ano:</label>
            <select wire:model.live="year"
                @error('year') class="border-2 border-red-500" @enderror
                name="year-select"
                id="year-select">
                <option value="">...</option>
                @foreach ($this->years as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="state-select">estado:</label>
            <select wire:model.live="state"
                @error('state') class="border-2 border-red-500" @enderror
                name="state-select"
                id="state-select">
                <option value="">...</option>
                @foreach ($this->states as $state)
                    <option value="{{ $state->value }}">{{ strtoupper($state->value) }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="city-select">cidade:</label>
            <select wire:model.live="city"
                @error('city') class="border-2 border-red-500" @enderror
                name="city-select"
                id="city-select">
                <option value="">...</option>
                @foreach ($this->cities as $city)
                    <option value="{{ $city['slug'] }}">{{ $city['name'] }}</option>
                @endforeach
            </select>
        </div>
        <button wire:click="enter"
            class="bg-black px-4 py-1 text-white drop-shadow transition-all duration-150 hover:font-bold hover:shadow-md">
            entrar
        </button>
    </div>
</div>
