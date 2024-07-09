<header class="flex justify-between items-center px-6 sm:px-12 lg:px-20 2xl:px-28 py-7 border-b border-b-primary-400 ">
    {{-- logo + nav --}}
    <div class="flex lg:justify-center items-center gap-20">
        {{-- logo --}}
        <a href="{{ route('home.index') }}" class="flex justify-center items-center gap-4">
            <img src="{{ asset('assets/logo.webp') }}" alt="" class="w-14">
            <h2 class="text-2xl sm:text-3xl font-medium">Sunny Shoreline</h2>
        </a>
        {{-- nav --}}
        <nav id="menu"
            class="fixed lg:static top-[117px] left-0 right-0 bottom-0  flex justify-center items-center bg-secondary-400 lg:bg-transparent translate-x-[100%] lg:translate-x-0 duration-500  ease-in-out">
            <ul class="flex flex-col lg:flex-row justify-center items-center gap-12 ">
                <x-nav-item href='#'>Apartamenty</x-nav-item>
                <x-nav-item href='#'>Kategorie</x-nav-item>
                <x-nav-item href='#'>O nas</x-nav-item>
                <x-nav-item href='#'>Blog</x-nav-item>
            </ul>
        </nav>
    </div>
    {{-- hamburger --}}
    <x-hamburger />
</header>
