@props(['categories'])

<ul class="flex justify-center items-center gap-6 flex-wrap">

    <x-link-btn type="third" wire:navigate href="{{ route('blog.index') }}" class="{{ $this->category === '' ? 'bg-primary-400 text-white border-none hover:bg-primary-400 ' : ' ' }}">Wszystkie</x-link-btn>
    @foreach ($categories as $category)
        <x-link-btn type="third" wire:navigate href="{{ route('blog.index', ['category' => $category->slug]) }}"
            class="{{ $category->slug === $this->category ? 'bg-primary-400 text-white border-none hover:bg-primary-400 ' : ' ' }}">{{ $category->title }}</x-link-btn>
    @endforeach
</ul>
