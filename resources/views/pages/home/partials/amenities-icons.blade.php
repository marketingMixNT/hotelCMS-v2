<section class="swiper advantages-swiper bg-bgLight-300 relative px-32 mt-4">
    <div class=" pt-14 py-20   swiper-wrapper">

        @foreach ($advantages as $item)
            <x-icon-slide :img="$item->getThumbnailUrl()" :name="$item->title" />
        @endforeach
    </div>


    <div class="absolute right-8 bottom-4 flex justify-center items-center gap-2 z-50">

        <button class=" advantages-prev"><x-iconpark-arrowcircleleft-o
                class="w-12 text-primary-400 hover:text-secondary-400 duration-500" />

        </button>
        <button class=" advantages-next"><x-iconpark-arrowcircleright-o
                class="w-12 text-primary-400 hover:text-secondary-400 duration-500" />

        </button>

    </div>
</section>
