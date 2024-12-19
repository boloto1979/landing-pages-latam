@php
    $backgroundImage = $blockData['image-banner'] ?? '';
    $title = $blockData['name-banner'] ?? 'Título do Banner';
    $buttons = $blockData['buttons'] ?? [];
@endphp

<div class="relative w-full bg-center bg-cover" style="background-image: url('{{ Storage::url($backgroundImage) }}'); min-height: 85vh;">
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

    <div class="relative flex flex-col items-center justify-center min-h-[80vh] p-8">
        @if(!empty($buttons))
            <div class="flex flex-wrap justify-center space-x-4 mt-96">
                @foreach($buttons as $button)
                    @php
                        $btnName = $button['name'] ?? 'Botão';
                        $btnLink = $button['link'] ?? '#';
                        $btnColor = $button['color'] ?? '#0ea5e9';
                    @endphp
                    <a href="{{ $btnLink }}"
                       class="px-16 py-2 text-white transition rounded-md hover:opacity-100"
                       style="background-color: {{ $btnColor }};">
                        {{ $btnName }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>

