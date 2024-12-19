<div class="max-w-screen-xl px-6 py-12 mx-auto mt-16">
    <div class="mb-16 text-center">
        <h2 class="text-3xl text-gray-800 lg:text-4xl">
            {{ $blockData['blog-section-title'] ?? 'Blog' }}
        </h2>
    </div>

    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @for ($i = 0; $i < ($blockData['posts_count'] ?? 6); $i++)
        <div class="overflow-hidden bg-white border border-gray-200 shadow-lg">
            <img src="https://iawd-assets.sfo3.digitaloceanspaces.com/challenge/thumbnail/2861/thumbnail_675870e4bf1ed.png" alt="Materiais PCR"
                 class="object-cover w-full h-64">
            <div class="p-8 text-center">
                <h3 class="mb-4 text-lg font-bold text-gray-800">
                    Materiais PCR
                </h3>
                <p class="mb-6 text-sm leading-relaxed text-gray-600">
                    A Natura busca alcançar suas metas de sustentabilidade até 2030 por meio da redução das emissões de carbono e do uso de plástico reciclado pós consumo incorporado nas embalagens.
                </p>
                <a href="#"
                   class="inline-block w-full py-2 text-sm font-semibold text-white bg-green-500 rounded-md hover:bg-green-600">
                    Ver Mais
                </a>
            </div>
        </div>
        @endfor
    </div>
</div>
