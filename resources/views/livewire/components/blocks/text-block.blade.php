@php
    $text = $blockData['title-block-text'] ?? 'Texto padrão';
    $textColor = $blockData['title-block-text-color'] ?? 'text-black';
    $backgroundColor = $page->primary_color ?? '#ffffff';
@endphp

<div class="px-4 py-8" style="background-color: {{ $backgroundColor }};">
    <div class="max-w-4xl mx-auto {{ $textColor }} text-center text-xl font-medium">
        {!! nl2br(e($text)) !!}
    </div>
</div>
