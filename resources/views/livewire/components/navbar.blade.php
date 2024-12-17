<nav class="sticky top-0 z-50" style="background-color: {{ $page->primary_color ?? '#0ea5e9' }};">
    <div class="flex items-center justify-center h-16 px-2">
        <a href="#home" class="flex items-center">
            @if(!empty($page->logo))
                <img src="{{ Storage::url($page->logo) }}" alt="Logo" class="w-auto h-20" />
            @else
                <span class="text-2xl font-bold text-white">{{ $page->title }}</span>
            @endif
        </a>
        <div class="items-center hidden ml-4 md:flex">
            @foreach($navItems as $item)
                <a href="#{{ $item['anchor'] }}" class="ml-4 text-base text-white hover:underline">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
        <div class="relative ml-auto md:hidden" x-data="{ open: false }">
            <button class="text-white" @click="open = !open">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <div x-show="open" @click.away="open = false"
                 class="absolute right-0 z-50 w-40 py-2 mt-2 text-black bg-white rounded shadow-lg">
                @foreach($navItems as $item)
                    <a href="#{{ $item['anchor'] }}" class="block px-3 py-2 hover:bg-gray-100">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav>
