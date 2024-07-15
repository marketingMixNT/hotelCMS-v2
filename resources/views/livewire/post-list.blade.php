<div>
    {{-- CATEGORIES --}}
    <x-section tight>
        <x-blog.all-categories :categories="$categories" />
    </x-section>
    {{-- FIRST POST --}}
    <x-section tight>
        <x-blog.first-post-index :post="$posts->first()" />
    </x-section>

    {{-- OTHER POSTS --}}
    <x-section tight>
        <div class="grid grid-cols-3 gap-6">
            @foreach ($posts->skip(1) as $post)
                <x-blog.other-post-index :post="$post" />
            @endforeach
        </div>

    </x-section>

    {{-- NAVIGATE --}}

    <nav class="max-w-screen-xl mx-auto px-6 md:px-16 pt-10 pb-20">
        {{ $posts->links('vendor.livewire.tailwind') }}
    </nav>
</div>
