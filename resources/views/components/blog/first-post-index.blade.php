<div class="flex flex-col lg:flex-row gap-12 group">
    <div class="w-full lg:w-[60%] flex">
        {{-- img --}}
        <a href="{{ route('blog.show', $post->slug) }}" class="overflow-hidden">
            <img src="{{ $post->getThumbnailUrl() }}" alt="{{ $post->title }}"
                class="group-hover:scale-110 duration-500  object-cover w-full aspect-square sm:aspect-video lg:aspect-square  max-h-[500px] lg:max-h-[700px]" width="624"
                height="400" loading="lazy">
        </a>
    </div>
    {{-- text --}}
    <div class="w-full lg:w-[40%] flex flex-col justify-center items-start gap-5">
        <div class="flex justify-start items-center gap-5">

            @foreach ($post->categories as $category)
                <x-ui.link-btn wire:navigate type='secondary'  type='secondary' :key="$category->slug"
                    href="{{ route('blog.index', ['category' => $category->slug]) }}">{{ $category->title }}</x-ui.link-btn>
            @endforeach

            <span class="text-sm">{{ $post->getReadingTime() }} min</span>

        </div>
        {{-- title & excerpt --}}
        <div class="flex flex-col justify-start gap-6">

            <h3 class="text-4xl xl:text-5xl font-medium" style="line-height: 1.2">{{ $post->title }}</h3>
            <p>{{ $post->getExcerpt() }}</p>

            <x-ui.link href="{{ route('blog.show', $post->slug) }}">Czytaj</x-ui.link>

        </div>
    </div>
</div>
