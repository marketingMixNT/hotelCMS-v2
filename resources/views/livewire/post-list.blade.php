<div >
    <x-section>
        {{-- FIRST POST --}}
        <x-blog.first-post-index :post="$this->posts[0]" />
    </x-section>
    {{-- CATEGORIES --}}
    <x-section class="py-0">
        <ul class="flex justify-center items-center gap-6 flex-wrap">

            @foreach ($this->categories as $category)
                <li><x-link-btn type='third' href="{{ $category->slug }}">{{ $category->title }}</x-link-btn></li>
            @endforeach
        </ul>
    </x-section>
    {{-- OTHER POSTS --}}
    <x-section>

        <div class="grid grid-cols-3 gap-6">
            @foreach ($this->posts->skip(1) as $post)
                <div class="w-full flex flex-col justify-start items-start gap-8">
                    {{-- IMG --}}
                    <div>
                        <a href="{{ $post->slug }}" class="overflow-hidden">
                            <img src="{{ $post->getThumbnailUrl() }}" alt="{{ $post->title }}"
                                class="group-hover:scale-110 duration-500  object-cover w-full aspect-[4/3]   width="624"
                                height="400" loading="lazy">
                        </a>
                    </div>
                    {{-- CONTENT --}}
                    <div class="flex flex-col justify-start items-start  gap-5  h-full">
                        {{-- categories --}}
                        <div class="flex justify-start items-center gap-6">

                            @foreach ($post->categories as $category)
                                <x-link-btn type='secondary'
                                    href="{{ $category->slug }}">{{ $category->title }}</x-link-btn>
                            @endforeach

                            <span class="text-sm">{{ $post->getReadingTime() }} min</span>
                        </div>
                        {{-- text --}}

                        <h2 class="text-2xl">{{ $post->title }}</h2>
                        <div class="flex flex-col justify-between h-full gap-6">

                            <p>{{ $post->getExcerpt() }}</p>
                            <x-ui.link href="{{ $post->slug }}">Czytaj</x-ui.link>
                        </div>


                    </div>
                </div>
            @endforeach
        </div>

    </x-section>

    <div class="max-w-screen-xl mx-auto px-6 md:px-16 pt-10 pb-20">

        {{ $this->posts->links('vendor.livewire.tailwind') }}
    </div>




   
</div>
