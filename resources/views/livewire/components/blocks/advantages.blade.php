@php
    $sectionTitle = $blockData['advantage-section-title'] ?? [];
    $advantages = $blockData['advantage'] ?? [];
    $backgroundColor = $page->primary_color;
@endphp

<div class="w-full py-12" style="background-color: {{ $backgroundColor }};">
    <div class="max-w-screen-xl px-12 mx-auto text-center">
        <h2 class="text-3xl font-semibold text-white">
            {{ $sectionTitle }}
        </h2>

        <div class="grid grid-cols-1 gap-12 py-24 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($advantages as $advantage)
                <div class="flex flex-col items-center text-center text-white">
                    <h3 class="mb-4 text-2xl font-semibold">
                        {{ $advantage['advantage_name'] ?? 'Título da Vantagem' }}
                    </h3>
                    <hr class="w-40 mb-4 border-white border-t-1">
                    <p class="text-base leading-relaxed break-words w-60 sm:w-72 lg:w-80">
                        {{ $advantage['advantage_description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
