<div>
    <h1>{{ $page->title }}</h1>

    @if(is_array($page->content))
        @foreach($page->content as $block)
            @php
                $blockType = $block['type'] ?? null;
                $blockData = $block['data'] ?? [];
            @endphp

            @if($blockType)
                @includeIf("livewire.components.blocks.$blockType", ['blockData' => $blockData])
            @endif
        @endforeach
    @endif
</div>
