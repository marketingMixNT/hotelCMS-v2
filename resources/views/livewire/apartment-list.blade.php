<div>
    {{-- CATEGORIES --}}
    <ul class="flex justify-center items-center gap-6 flex-wrap">

        <x-ui.link-btn wire:navigate type="third" href="{{ route('apartment.index') }}" wire:key="all"
            class="{{ $this->category === '' ? 'bg-primary-400 text-white border-none hover:bg-primary-400 ' : 'bg-white border border-black hover:bg-gray-100' }}">Wszystkie</x-ui.link-btn>
        @foreach ($categories as $category)
            <x-ui.link-btn wire:navigate type="third" href="{{ route('apartment.index', ['category' => $category->slug]) }}"
                wire:key="{{ $category->slug }}"
                class="{{ $category->slug === $this->category ? 'bg-primary-400 text-white border-none hover:bg-primary-400 ' : ' bg-white border border-black hover:bg-gray-100' }}">{{ $category->title }}</x-ui.link-btn>
        @endforeach
    </ul>

    <x-section>
    {{-- APARTMENTS --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-12 py-16">

        @foreach ($apartments as $apartment)

            <x-apartment-card :apartment="$apartment" />
        @endforeach
    </div>
    </x-section>
    {{-- NAVIGATE --}}

    <nav class="max-w-screen-xl mx-auto px-6 md:px-16 pt-10 pb-20">
        {{ $apartments->links('vendor.livewire.tailwind') }}
    </nav>
</div>