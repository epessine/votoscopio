<x-slot:title>{{ "{$this->city->name} - {$this->city->state->value} ({$this->year}) | ".config('app.name') }} </x-slot:title>

<div class="flex h-full w-full flex-col items-center justify-center gap-12">
    <h1 class="text-5xl font-bold drop-shadow-sm">  
        {{ $city->name }} - {{ $city->state->value }} ({{ $year }})
    </h1>
    <section class="flex gap-8">
        <section class="flex flex-col items-center justify-center gap-3 font-mono">
            <h2 class="text-xl font-semibold drop-shadow">(pré)candidatos:</h2>
            <ul>
                @foreach ($candidates as $candidate)
                    <li class="ml-3 list-disc">{{ $candidate->name }}
                        ({{ $candidate->party }})
                    </li>
                @endforeach
            </ul>
        </section>
        <section class="flex flex-col items-center justify-center gap-3 font-mono">
            <h2 class="text-xl font-semibold drop-shadow">intencão de voto (estimulado):</h2>
            <div class="h-[400px] w-screen max-w-2xl">
                {{ $this->estimulatedVotes }}
            </div>
        </section>
    </section>
</div>
