<div class="max-w-screen-xl px-6 py-12 mx-auto">
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-gray-800 lg:text-4xl">
            {{ $blockData['blog-section-title'] ?? 'Blog' }}
        </h2>
    </div>

    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @for ($i = 0; $i < ($blockData['posts_count'] ?? 6); $i++)
        <div class="overflow-hidden bg-white rounded-lg shadow-lg">
            <img src="https://via.placeholder.com/500x250" alt="Desafio 1" class="object-cover w-full h-40">
            <div class="p-6">
                <h3 class="mb-2 text-lg font-bold text-gray-800">Desafio 1</h3>
                <p class="mb-4 text-sm text-gray-600">
                    Breve descrição do primeiro desafio, onde é possível detalhar objetivos e informações.
                </p>
                <div class="flex justify-between">
                    <a href="#" class="text-blue-600 hover:underline">Ver Mais</a>
                    <a href="#" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">Aplicar</a>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>
