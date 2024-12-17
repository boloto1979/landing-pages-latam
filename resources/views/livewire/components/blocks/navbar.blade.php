<nav class="sticky top-0 z-50" style="{{ $landing_page->primary_color ? "background-color: {$landing_page->primary_color};" : "" }}" x-data="{ open: false }">
    <div class="container flex items-center justify-between h-16 px-4 mx-auto">
        <a href="{{ route('landing_page.show', $landing_page) }}" class="flex items-center">
            <img src="{{ Storage::url($landing_page->logo_white) }}" alt="Logo" class="w-auto h-8" />
        </a>

        <button class="text-white lg:hidden" @click="open = !open">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <div class="hidden lg:flex lg:items-center lg:space-x-4">
            <a href="#home" class="text-white hover:underline">Home</a>
            @if(($landing_page->logo_corporate && $landing_page->corporation_title && $landing_page->corporation_description) || ($landing_page->page_type == 'sample'))
                <a href="#about" class="text-white hover:underline">{{ __('company.landing_page.show.navigation.about') }}</a>
            @endif

            @if(($landing_page->adv_1_title || $landing_page->adv_2_title || $landing_page->adv_3_title || $landing_page->adv_4_title || $landing_page->adv_5_title || $landing_page->adv_6_title) || ($landing_page->page_type == 'sample'))
                @if($landing_page->slug == 'latam-innovation')
                    <a href="#advantages" class="text-white hover:underline">{{ __('company.landing_page.show.navigation.products') }}</a>
                @else
                    <a href="#advantages" class="text-white hover:underline">{{ __('company.landing_page.show.navigation.advantages') }}</a>
                @endif
            @endif

            @if(isset($landing_page->schedule) && $landing_page->schedule->count())
                <a href="#schedule" class="text-white hover:underline">{{ __('company.landing_page.show.navigation.schedule') }}</a>
            @endif

            @if($landing_page->slug == 'latam-innovation')
                <a href="#mentors" class="text-white hover:underline">{{ __('company.landing_page.show.navigation.team') }}</a>
            @elseif($juryProfiles->count() || $landing_page->page_type == 'sample')
                <a href="#mentors" class="text-white hover:underline">{{ __('company.landing_page.show.navigation.mentors') }}</a>
            @endif

            @if($contents->count())
                <a href="#blog" class="text-white hover:underline">Blog</a>
            @endif
        </div>

        <div class="hidden lg:flex lg:items-center lg:space-x-4">
            @auth
                <a href="{{ route('go') }}" class="text-white hover:underline">Dashboard</a>
            @endauth

            @guest
                <a href="{{ $landing_page->navbar_login_button_url ?? route('login', $landing_page) }}"
                   class="px-3 py-1 text-white transition border border-white rounded hover:bg-white hover:text-black">
                   {{ $landing_page->navbar_login_button_text ?? 'Login' }}
                </a>
            @endguest

            <a href="{{ $landing_page->cta_button_url ?? '#challenges' }}"
               class="px-3 py-1 text-white transition bg-green-500 rounded hover:bg-green-600">
               {{ $landing_page->cta_button_text ?? __('company.landing_page.show.challenges') }}
            </a>

            @if(auth()->check())
                <div class="relative" x-data="{ dropdownOpen: false }">
                    <button class="text-white" @click="dropdownOpen = !dropdownOpen">
                        <i class="bi bi-gear fa-lg"></i>
                    </button>
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute right-0 w-48 mt-2 text-black bg-white rounded shadow-lg">
                        <a class="block px-4 py-2 hover:bg-gray-200" href="{{ route('user.profile.edit') }}">
                            {{ __('company.navigation.profileEdit') }}
                        </a>
                        <a class="block px-4 py-2 hover:bg-gray-200" href="#"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="lg:hidden" x-show="open" @click.away="open = false">
        <div class="px-4 py-2 space-y-2 text-black bg-white">
            <a href="#home" class="block px-2 py-1 rounded hover:bg-gray-100">Home</a>
            @if(($landing_page->logo_corporate && $landing_page->corporation_title && $landing_page->corporation_description) || ($landing_page->page_type == 'sample'))
                <a href="#about" class="block px-2 py-1 rounded hover:bg-gray-100">{{ __('company.landing_page.show.navigation.about') }}</a>
            @endif

            @if(($landing_page->adv_1_title || $landing_page->adv_2_title || $landing_page->adv_3_title || $landing_page->adv_4_title || $landing_page->adv_5_title || $landing_page->adv_6_title) || ($landing_page->page_type == 'sample'))
                @if($landing_page->slug == 'latam-innovation')
                    <a href="#advantages" class="block px-2 py-1 rounded hover:bg-gray-100">{{ __('company.landing_page.show.navigation.products') }}</a>
                @else
                    <a href="#advantages" class="block px-2 py-1 rounded hover:bg-gray-100">{{ __('company.landing_page.show.navigation.advantages') }}</a>
                @endif
            @endif

            @if(isset($landing_page->schedule) && $landing_page->schedule->count())
                <a href="#schedule" class="block px-2 py-1 rounded hover:bg-gray-100">{{ __('company.landing_page.show.navigation.schedule') }}</a>
            @endif

            @if($landing_page->slug == 'latam-innovation')
                <a href="#mentors" class="block px-2 py-1 rounded hover:bg-gray-100">{{ __('company.landing_page.show.navigation.team') }}</a>
            @elseif($juryProfiles->count() || $landing_page->page_type == 'sample')
                <a href="#mentors" class="block px-2 py-1 rounded hover:bg-gray-100">{{ __('company.landing_page.show.navigation.mentors') }}</a>
            @endif

            @if($contents->count())
                <a href="#blog" class="block px-2 py-1 rounded hover:bg-gray-100">Blog</a>
            @endif

            @auth
                <a href="{{ route('go') }}" class="block px-2 py-1 rounded hover:bg-gray-100">Dashboard</a>
            @endauth

            @guest
                <a href="{{ $landing_page->navbar_login_button_url ?? route('login', $landing_page) }}"
                   class="block px-3 py-1 text-black transition border border-black rounded hover:bg-black hover:text-white">
                   {{ $landing_page->navbar_login_button_text ?? 'Login' }}
                </a>
            @endguest

            <a href="{{ $landing_page->cta_button_url ?? '#challenges' }}"
               class="block px-3 py-1 text-white transition bg-green-500 rounded hover:bg-green-600">
               {{ $landing_page->cta_button_text ?? __('company.landing_page.show.challenges') }}
            </a>

            @if(auth()->check())
                <div x-data="{ mobileDropdownOpen: false }">
                    <button class="w-full px-2 py-1 text-left rounded hover:bg-gray-100" @click="mobileDropdownOpen = !mobileDropdownOpen">
                        <i class="bi bi-gear"></i> {{ __('company.navigation.account') }}
                    </button>
                    <div x-show="mobileDropdownOpen" class="mt-2 rounded shadow-lg bg-gray-50">
                        <a class="block px-4 py-2 hover:bg-gray-100" href="{{ route('user.profile.edit') }}">
                            {{ __('company.navigation.profileEdit') }}
                        </a>
                        <a class="block px-4 py-2 hover:bg-gray-100" href="#"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>
