@props(['apartment'])

<div class="flex flex-col group ">
    <a href="{{route('apartment.show',$apartment->slug)}}">

        <div class="overflow-hidden relative">
            <div class="overflow-hidden">

                <img src="{{ $apartment->getThumbnailUrl() }}" alt="{{ $apartment->title }}" class="hover:scale-105 duration-500">
            </div>

            <div class="flex justify-start items-center mt-4  gap-y-3 flex-wrap">

                @foreach ($apartment->categories as $category)
                 
                    <x-ui.link-btn class="mr-4" type="badge-small" href="">{{ $category->title }}</x-ui.link-btn>
                @endforeach
            </div>
        </div>
        <div class="flex justify-between items-center px-2 py-4">

            <div class="flex flex-col justify-between items-start gap-3">
                <h2 class="text-2xl">{{ $apartment->name }}</h2>
                <span class="text-sm">{{ $apartment->region }}</span>
                <span class="text-sm">od <span class="text-lg">{{ $apartment->price }}</span> zł</span>

            </div>
            <div class="self-end mb-3"><x-ui.link-btn href="{{route('apartment.show',$apartment->slug)}}">Sprawdź</x-ui.link-btn></div>
        </div>
    </a>
</div>
