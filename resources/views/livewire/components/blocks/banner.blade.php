@php
    $backgroundImage = $blockData['image-banner'] ?? '';
    $title = $blockData['name-banner'] ?? 'Título do Banner';
    $buttons = $blockData['buttons'] ?? [];
@endphp

<div class="relative w-full bg-center bg-cover" style="background-image: url('{{ Storage::url($backgroundImage) }}'); min-height: 80vh;">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

    <div class="relative flex flex-col items-center justify-center min-h-[80vh] p-8">
        @if(!empty($buttons))
            <div class="flex flex-wrap justify-center mt-6 space-x-4">
                @foreach($buttons as $button)
                    @php
                        $btnName = $button['name'] ?? 'Botão';
                        $btnLink = $button['link'] ?? '#';
                        $btnColor = $button['color'] ?? '#0ea5e9';
                    @endphp
                    <a href="{{ $btnLink }}"
                       class="px-4 py-2 font-semibold text-white transition rounded hover:opacity-90"
                       style="background-color: {{ $btnColor }};">
                        {{ $btnName }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
