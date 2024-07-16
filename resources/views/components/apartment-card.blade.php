<div class="flex flex-col group ">
    <a href="">

        <div class="overflow-hidden relative"><img src="{{ $img }}" alt=""
                class="group-hover:scale-110 duration-500">
            
                <x-ui.link-btn class="absolute left-8 bottom-8" type="secondary" href="">Kategoria</x-ui.link-btn>
            </div>
        <div class="flex justify-between items-center px-2 py-4">

            <div class="flex flex-col justify-between items-start gap-3">
                <h2 class="text-2xl">{{ $title }}</h2>
                <span class="text-sm">{{ $location }}</span>
                <span class="">od {{ $price }}zł</span>

            </div>
            <div class="self-end mb-3"><x-ui.link-btn href="{{ $link }}">Sprawdź</x-ui.link-btn></div>
        </div>
    </a>
</div>
