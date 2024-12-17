<div>
    @includeIf('livewire.components.navbar', ['page' => $page, 'navItems' => $navItems])

    @if(is_array($page->content))
        @foreach($page->content as $block)
            @php
                $blockType = $block['type'] ?? null;
                $blockData = $block['data'] ?? [];
            @endphp

            @if($blockType)
                <section id="{{ $blockType }}" class="bg-white">
                    @includeIf("livewire.components.blocks.$blockType", ['blockData' => $blockData])
                </section>
            @endif
        @endforeach
    @endif
</div>
