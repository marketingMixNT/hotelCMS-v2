<header>
    {{-- top --}}
    <div class="flex justify-between items-center px-6 sm:px-12 lg:px-20 2xl:px-28 py-7 border-b border-b-primary-400">
        {{-- logo + nav --}}
        <div class="flex lg:justify-center items-center gap-20">
            {{-- logo --}}
            <a href="{{ route('home.index') }}" class="flex justify-center items-center lg:gap-1">
                <img src="{{ asset('assets/logo.webp') }}" alt="logo Sagi Fiordów" width="80" height="60"
                    class="w-20">
                <h2 class="text-2xl sm:text-[26px] font-medium">Saga Fiordów</h2>
            </a>
            {{-- nav --}}
            <nav id="menu"
                class="fixed lg:static top-[121px] left-0 right-0 bottom-0  flex justify-center items-center bg-primary-400 lg:bg-transparent translate-x-[100%] lg:translate-x-0 duration-500  ease-in-out z-50">
                <x-nav.nav-list />
                <x-social light  class="absolute bottom-5 left-1/2 transform -translate-x-1/2 lg:hidden" />
            </nav>
        </div>
        {{-- hamburger --}}
        <x-nav.hamburger />
    </div>
    {{ $slot }}
</header>
