@php
    $sectionTitle = $blockData['advantage-section-title'] ?? [];
    $advantages = $blockData['advantage'] ?? [];
    $backgroundColor = $page->primary_color ?? '#00bcd4';
@endphp

<div class="w-full py-12" style="background-color: {{ $backgroundColor }};">
    <div class="max-w-screen-xl px-12 mx-auto text-center">
        <h2 class="text-3xl font-semibold text-white ">
            {{ $sectionTitle }}
        </h2>


        <div class="grid grid-cols-1 gap-12 py-24 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($advantages as $advantage)
                <div class="text-white">
                    <h3 class="mb-2 text-lg font-semibold">
                        {{ $advantage['advantage_name'] ?? 'Título da Vantagem' }}
                    </h3>
                    <hr class="mx-auto mb-1 border-white border-t-1 w-80">
                    <p class="text-sm leading-relaxed break-words w-[50ch] mx-auto">
                        {{ $advantage['advantage_description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
