@props(['post'])



        <div class="w-full flex flex-col justify-start items-start gap-8">
            {{-- IMG --}}
            <div class="w-full">
                <a href="{{ route('blog.show', $post->slug) }}" class="overflow-hidden">
                    <img src="{{ $post->getThumbnailUrl() }}" alt="{{ $post->title }}"
                        {{-- class="group-hover:scale-110 duration-500 object-cover w-full aspect-video lg:aspect-[4/3]" width="624" --}}
                        class="group-hover:scale-110 duration-500  object-cover w-full aspect-[4/3] sm:aspect-video lg:aspect-[4/3]" width="624"
                        height="400" loading="lazy">

                        {{-- group-hover:scale-110 duration-500  object-cover w-full aspect-square sm:aspect-video lg:aspect-square --}}
                </a>
            </div>
            {{-- CONTENT --}}
            <div class="flex flex-col justify-start items-start gap-5 h-full">
                {{-- category & reading time --}}
                <div class="flex justify-start items-center gap-6">
                    @foreach ($post->categories as $category)
                        <x-ui.link-btn wire:navigate  type='secondary' :key="$category->slug"
                            href="{{ route('blog.index', ['category' => $category->slug]) }}">{{ $category->title }}</x-ui.link-btn>
                    @endforeach
                    <span class="text-sm">{{ $post->getReadingTime() }} min</span>
                </div>
                {{-- text --}}
                <h2 class="text-2xl">{{ $post->title }}</h2>
                <div class="flex flex-col justify-between h-full gap-6">
                    <p>{{ $post->getExcerpt() }}</p>
                    <x-ui.link href="{{ route('blog.show', $post->slug) }}">Czytaj</x-ui.link>
                </div>
            </div>
        </div>
 