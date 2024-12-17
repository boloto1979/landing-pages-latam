@php
    $videoTitle = $blockData['video_title'] ?? 'Vídeo de apresentação';
    $rawUrl = $blockData['video_url'] ?? '';

    if (strpos($rawUrl, 'youtube.com/watch?v=') !== false) {
        $rawUrl = str_replace('watch?v=', 'embed/', $rawUrl);
    } elseif (strpos($rawUrl, 'youtu.be/') !== false) {
        $videoId = substr($rawUrl, strpos($rawUrl, 'youtu.be/') + 9);
        $rawUrl = 'https://www.youtube.com/embed/' . $videoId;
    }
    if (strpos($rawUrl, 'vimeo.com/') !== false && !strpos($rawUrl, 'player.vimeo.com')) {
        $vimeoId = preg_replace('/[^0-9]/', '', $rawUrl);
        $rawUrl = 'https://player.vimeo.com/video/' . $vimeoId;
    }
@endphp

<div class="relative w-full overflow-hidden" style="min-height: 80vh;">
    <iframe
        src="{{ $rawUrl }}"
        title="{{ $videoTitle }}"
        class="absolute top-0 left-0 w-full h-full"
        style="border: none;"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen"
        allowfullscreen>
    </iframe>
</div>
