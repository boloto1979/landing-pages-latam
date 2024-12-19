@php
    $backgroundImage = $blockData['image-banner'] ?? '';
    $title = $blockData['name-banner'] ?? 'Título do Banner';
    $buttons = $blockData['buttons'] ?? [];
@endphp

<div class="relative w-full bg-center bg-cover" style="background-image: url('{{ Storage::url($backgroundImage) }}'); min-height: 85vh;">
    <div class="absolute inset-0 bg-opacity-10"></div>

    <div class="relative flex flex-col items-center justify-center min-h-[80vh] p-8">
        @if(!empty($buttons))
            <div class="flex flex-wrap justify-center gap-4 mt-96">
                @foreach($buttons as $button)
                    @php
                        $btnName = $button['name'] ?? 'Botão';
                        $btnLink = $button['link'] ?? '#';
                        $btnColor = $button['color'] ?? '#0ea5e9';
                    @endphp
                    <a href="{{ $btnLink }}"
                       class="px-6 py-2 text-sm font-semibold text-center text-white rounded-md hover:opacity-90"
                       style="background-color: {{ $btnColor }}; min-width: 120px;">
                        {{ $btnName }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
