<x-slot:title>{{ "{$this->city->name} - {$this->city->state->value} ({$this->year}) | " . config('app.name') }}
</x-slot:title>

<div class="my-14 flex h-full w-full flex-col items-center justify-center gap-12 px-10 text-center">
    <h1 class="text-5xl font-bold drop-shadow-sm">
        {{ $city->name }} - {{ $city->state->value }} ({{ $year }})
    </h1>
    <section class="flex flex-col gap-8 lg:flex-row">
        <section class="flex flex-col items-center justify-center gap-3 font-mono">
            <h2 class="text-xl font-semibold drop-shadow">(pré)candidatos:</h2>
            <ul class="text-left">
                @foreach ($candidates as $candidate)
                    <li class="ml-3 list-disc">{{ $candidate->name }}
                        ({{ $candidate->party }})
                    </li>
                @endforeach
            </ul>
        </section>
        <section class="flex flex-col items-center justify-center gap-3 font-mono">
            <h2 class="text-xl font-semibold drop-shadow">intencão de voto (estimulado):</h2>
            <div class="h-[600px] w-full max-w-2xl sm:h-[400px] sm:w-screen">
                {{ $this->estimulatedVotes }}
            </div>
        </section>
    </section>
    <section class="flex flex-col gap-8 lg:flex-row">
        <section class="flex flex-col items-center justify-center gap-3 font-mono">
            <h2 class="text-xl font-semibold drop-shadow">pesquisas:</h2>
            <ul class="text-left">
                @foreach ($city->pools as $pool)
                    <li class="ml-3 list-decimal">
                        <span class="inline-block max-w-[90%] truncate sm:max-w-[unset]">{{ $pool->organization }}
                            ({{ $pool->date->toDateString() }})
                        </span>
                        <a target="_blank" href="{{ $pool->source }}" class="text-sm text-blue-600 underline">
                            <svg class="-ml-1 mb-0.5 inline w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                            </svg>
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
    </section>
</div>
