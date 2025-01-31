@props(['categories'])

<ul class="flex justify-center items-center gap-6 flex-wrap">

    <x-ui.link-btn wire:navigate type="third" href="{{ route('blog.index') }}" wire:key="all"
        class="{{ $this->category === '' ? 'bg-primary-400 text-white border-none hover:bg-primary-400 ' : 'bg-white border border-black hover:bg-gray-100' }}">Wszystkie</x-ui.link-btn>
    @foreach ($categories as $category)
        <x-ui.link-btn wire:navigate type="third" href="{{ route('blog.index', ['category' => $category->slug]) }}"
            wire:key="{{ $category->slug }}"
            class="{{ $category->slug === $this->category ? 'bg-primary-400 text-white border-none hover:bg-primary-400 ' : ' bg-white border border-black hover:bg-gray-100' }}">{{ $category->title }}</x-ui.link-btn>
    @endforeach
</ul>
