@php
    $text = $blockData['title-block-text'] ?? 'Texto padrão';
    $textColor = $blockData['title-block-text-color'] ?? 'text-black';
    $backgroundColor = $page->secondary_color ?? '#ffffff';
@endphp

<div class="px-4 py-24" style="background-color: {{ $backgroundColor }};">
    <div class="max-w-7xl mx-auto {{ $textColor }} text-center text-3xl ">
        {!! nl2br(e($text)) !!}
    </div>
</div>
