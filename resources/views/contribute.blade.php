@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
    @livewireScripts
@endpush

<x-layouts.app :title="'contribua | ' . config('app.name')">
    <div class="my-14 flex h-full w-full flex-col items-center justify-center gap-12 text-center px-10">
        <h2 class="text-3xl font-bold drop-shadow-sm">como contribuir com o projeto:</h2>

        <section x-data class="flex flex-col items-center gap-4 max-w-full">
            <h2 class="text-2xl font-bold drop-shadow-sm">contribuições financeiras</h2>
            <p class="max-w-lg text-center text-lg drop-shadow-sm">envie um PIX copiando <span x-on:click="navigator.clipboard.writeText('00020126850014BR.GOV.BCB.PIX0136a6d7a657-35d4-4734-bcdd-fcb54cf9988e0223Contribuição votoscópio5204000053039865802BR5923Eduardo Toresin Pessine6009SAO PAULO62140510vZ94aVek26630490BF'); alert('código copiado!')" class="text-blue-600 underline cursor-pointer">nosso código</span>.</p>
            <div class="rounded-lg bg-gray-100 pr-10 text-left mt-2">

            </div>
        </section>

        <section class="flex flex-col items-center gap-4 max-w-full">
            <h2 class="text-2xl font-bold drop-shadow-sm">envio/alteração de pesquisas</h2>
            <p class="max-w-lg text-center text-lg drop-shadow-sm">para enviar novas pesquisas para uma cidade, <a
                   href="https://github.com/epessine/votoscopio/compare" target="_blank"
                   class="text-blue-600 underline">abra um pull request</a> com um arquivo json de acordo com o schema
                abaixo no caminho <span class="rounded-lg bg-gray-100 inline overflow-scroll"><code
                      class="prettyprint p-1.5 text-xs sm:text-sm">database/pools/{ano}/{estado}/{slug_da_cidade}</code></span>:
            </p>
            <div class="rounded-lg bg-gray-100 pr-10 text-left mt-2 max-w-full overflow-scroll">
                <pre class="prettyprint rounded-lg !border-0">
                    <code class="language-js">
    {
        "name": string, // nome da cidade
        "code": int, // código do IBGE*
        "candidates": [
            {
                "id": int, // identificador local do candidato
                "name": string, // nome completo do candidato
                "party": string // sigla do partido
            },
            ...
        ],
        "pools": [
            {
                "org": string, // empresa realizadora da pesquisa
                "id": string, // número de identificação do TSE**
                "source": string, // url da fonte dos resultados
                "date": string, // data da pesquisa
                "votes_estimulated": {
                    "candidates": [
                        {
                            "candidate_id": int, // identificador local do candidato
                            "percentage": float // porcentagem relativa ao candidato
                        },
                        ...
                    ],
                    "nulls": float, // porcentagem de nulos/brancos
                    "no_response": float // porcentagem de recusas
                }
            },
            ...
        ]
    }
                    </code>
                </pre>
            </div>
            <div>
                <p class="text-center text-lg drop-shadow-sm">* <a
                       href="https://www.ibge.gov.br/explica/codigos-dos-municipios.php" target="_blank"
                       class="text-blue-600 underline">Códigos dos Municípios do IGBE</a></p>
                <p class="text-center text-lg drop-shadow-sm">** <a
                       href="https://www.tse.jus.br/eleicoes/pesquisa-eleitorais/consulta-as-pesquisas-registradas"
                       target="_blank" class="text-blue-600 underline">Consultas de pesquisas no TSE</a></p>
            </div>
        </section>

        <section class="flex flex-col items-center gap-4">
            <h2 class="text-2xl font-bold drop-shadow-sm">correções e/ou melhorias de código</h2>
            <p class="max-w-lg text-center text-lg drop-shadow-sm"><a
                   href="https://github.com/epessine/votoscopio/compare" target="_blank"
                   class="text-blue-600 underline">abra um pull request</a> com as sugestões para análise.
            </p>
            <div class="rounded-lg bg-gray-100 pr-10 text-left mt-2">

            </div>
        </section>
    </div>
</x-layouts.app>
