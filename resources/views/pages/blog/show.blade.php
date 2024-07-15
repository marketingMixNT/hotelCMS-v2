<x-layouts.app>

    <x-slot name='header'>
        <div class="text-left max-w-screen-xl mx-auto  space-y-5 pt-10 px-6 md:px-16 2xl:px-0">
            <div class="flex justify-between items-center">
                <div class="flex justify-start items-center gap-6">
                    @foreach ($post->categories as $category)
                        <x-link-btn  type='secondary' :key="$category->slug"
                            href="{{ route('blog.index', ['category' => $category->slug]) }}">{{ $category->title }}</x-link-btn>
                    @endforeach
                    <span class="text-sm">{{ $post->getReadingTime() }} min</span>
                </div>
                <x-ui.link class="hidden xxs:flex" back href="{{ url()->previous() }}">powrót</x-ui.link>
            </div>
            <h1 class="text-6xl lg:w-3/4 text-center lg:text-left">{{ $post->title }}</h1>
        </div>
    </x-slot>

    <x-slot name='main'>
        <x-section tight>
            <img src="{{ $post->getThumbnailUrl() }}" alt=""
                class="w-full object-cover aspect-video max-h-[600px]" width="16" height="9">
            <div class="py-10">
                <div class="flex justify-between items-center">
                    <div class="flex flex-col justify-start items-start gap-2">
                        <span class="text-base font-medium">Publikacja:</span>
                        <span class="text-sm"> {{ $post->getPublishedDate() }}</span>
                    </div>
                    <div class="flex justify-center items-center gap-4">
                        <a href="#">
                            <x-iconpark-facebook-o class="w-5" />
                        </a>
                        <a href="">
                            <x-iconpark-instagram-o class="w-5" />
                        </a>
                        <a href="">
                            <x-iconpark-instagramone-o class="w-5" />
                        </a>
                        <a href="">
                            <x-iconpark-youtube-o class="w-5" />
                        </a>

                    </div>
                </div>
            </div>
            <article class="max-w-screen-lg mx-auto prose" style="line-height:1.6">
                {!! $post->content !!}
            </article>
        </x-section>



<x-section tight>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        @foreach ($latestPosts as $post)
        <x-blog.other-post-index :post="$post" :key="$post->id" />
            @endforeach
        </div>
</x-section>





    </x-slot>


</x-layouts.app>
