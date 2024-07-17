<x-layouts.app>
    <x-slot name='header'>
        <div class="w-full h-[calc(100vh-117px)] bg-fixed bg-no-repeat bg-cover bg-center relative bg-gray-400 bg-blend-multiply"
            style="background-image: url({{ asset($apartment->getThumbnailUrl()) }})">

            <h1 class="absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 text-9xl font-bold text-fontLight">
                {{ $apartment->name }}</h1>

            <div class="absolute left-8 bottom-8 flex justify-start items-center mt-4  gap-y-3 flex-wrap">

                @foreach ($apartment->categories as $category)
                    <x-ui.link-btn class="mr-4" type="badge-small" href="">{{ $category->title }}</x-ui.link-btn>
                @endforeach

            </div>
        </div>
    </x-slot>

    <x-slot name='main'>

        <x-section>
            <div class="flex justify-start items-start gap-x-12">

                <div class="w-[60%] text-2xl" style="line-height: 1.6">
                    {!! $apartment->short_desc !!}
                </div>
                <div class="w-[40%] grid grid-cols-2 border-l border-black h-full gap-y-10 gap-x-14 p-12">
                    <div>
                        <h2 class="font-bold">Liczba osób</h2>
                        <span>max. {{ $apartment->persons }}</span>
                    </div>

                    <div>
                        <h2 class="font-bold">Cena</h2>
                        <span>od {{ $apartment->price }} zł</span>
                    </div>
                    <div>
                        <h2 class="font-bold">Adres</h2>
                        <span>{{ $apartment->region }}</span>
                    </div>
                    <div class="flex justify-start items-center">
                        <x-ui.link-btn :href="$apartment->link">Zarezerwuj</x-ui.link-btn>
                    </div>
                </div>
            </div>

        </x-section>


        <x-section tight class="bg-bgLight-300">

            <div class=" relative px-32 mt-4 flex justify-center items-center w-full">

                @foreach ($apartment->advantages as $item)
                    <x-icon-slide :img="$item->getThumbnailUrl()" :name="$item->title" />
                @endforeach
            </div>

        </x-section>
        <x-section class="">

            <div class="flex">

                <div class="w-[55%] flex flex-col gap-y-12 relative">


                    @foreach (collect($apartment->gallery)->slice(0, 3) as $img)
                        <img src="{{ asset('storage/' . $img) }}" alt="Gallery image" class="w-full sticky top-12">
                    @endforeach

                </div>
                <div class="w-[45%] pl-12 prose relative">

                    <div class="sticky top-12">

                        {!! $apartment->desc !!}
                    </div>
                </div>
            </div>


        </x-section>

        <x-section>

            <div class="space-y-5">

                <h2 class="text-6xl font-medium">Benefity</h2>
                <p class="text-lg">Entdecken Sie die Highlights dieser Unterkunft, welche wir für Sie entdecket haben.
                </p>
            </div>

            <div class="flex py-24 gap-x-12">

                <div class="w-1/2 grid grid-cols-2  gap-x-16 gap-y-12">
                    @foreach ($apartment->benefits as $benefit)
                        <div>
                            <h3 class="text-3xl font-medium">{{ $benefit->title }}</h3>
                            <p>{{ $benefit->content }}</p>
                        </div>
                    @endforeach

                </div>
                <div class="w-1/2">
                    <img src="{{ asset('storage/' . $apartment->gallery[4]) }}" alt="">
                </div>

            </div>

        </x-section>

        <x-section>

            <div class="space-y-5">

                <h2 class="text-6xl font-medium">Galeria</h2>
                <p class="text-lg">Entdecken Sie die Highlights dieser Unterkunft, welche wir für Sie entdecket haben.
                </p>
            </div>


        </x-section>

        <div class="swiper apartment-gallery-swiper  mt-4">
            <div class="py-32  swiper-wrapper">

                @foreach ($apartment->gallery as $img)
                    <a data-fslightbox href="{{ asset('storage/' . $img) }}" class=" swiper-slide">

                        <img src="{{ asset('storage/' . $img) }}" alt=""
                            class=" h-full w-full object-cover aspect-square">
                    </a>
                @endforeach
            </div>

            <div class="absolute right-8 bottom-4 flex justify-center items-center gap-2 z-50">

                <button class=" apartment-gallery-prev"><x-iconpark-arrowcircleleft-o
                        class="w-12 text-primary-400 hover:text-secondary-400 duration-500" />

                </button>
                <button class=" apartment-gallery-next"><x-iconpark-arrowcircleright-o
                        class="w-12 text-primary-400 hover:text-secondary-400 duration-500" />

                </button>

            </div>
        </div>


        <x-section class="bg-black text-fontLight">

            <div class="flex gap-10">
                <div class='w-1/2 flex flex-col gap-6 justify-start items-start'>
                    <h2 class="text-6xl">Buchen Sie Ihre Unterkunft</h2>
                    <p class="text-lg" style="line-height: 1.6">Eingebettet in die atemberaubende Landschaft der Toskana
                        lädt das Murlo-Anwesen Reisende mit
                        seinem zeitlosen Charme und seiner ruhigen Schönheit ein. Während Sie durch die sanften Hügel
                        und üppigen Weinberge streifen, entdecken Sie ein Refugium, in dem Luxus und Natur nahtlos
                        miteinander verschmelzen. Von dem Moment an, in dem Sie ankommen, umarmt Sie die herzliche
                        Gastfreundschaft Italiens und lädt Sie ein, eine Reise der Ruhe und des Genusses anzutreten.</p>
                    <x-ui.link-btn :href="$apartment->link">Zarezerwuj</x-ui.link-btn>
                </div>
                <div class="w-1/2"><img src="{{ $apartment->getThumbnailUrl() }}" alt="" class="py-12"></div>
            </div>
        </x-section>


        <x-section>
            <div class="space-y-5">

                <h2 class="text-6xl font-medium">Blog</h2>
                <p class="text-lg">Entdecken Sie die Highlights dieser Unterkunft, welche wir für Sie entdecket haben.
                </p>
            </div>


            <div class="flex justify-center gap-x-12">

                <div class="w-1/3 h-full flex flex-col justify-start gap-6 group">
                    {{-- thumbnail --}}
                    <a href="#" class="overflow-hidden">
                        <img src="{{ $apartment->getThumbnailUrl() }}" alt="{{ $apartment->name }}"
                            class="group-hover:scale-110 duration-500 lg:h-[400px] object-cover w-full aspect-video"
                            width="624" height="400" loading="lazy">
                    </a>
                    {{-- categories & reading time --}}
                    <div class="flex justify-start items-center gap-5">

                        {{-- @foreach ($post->categories as $category)
                            <x-ui.link-btn wire:navigate :key="$category->slug" type='secondary' href="{{ $category->slug }}">{{ $category->title }}</x-ui.link-btn>
                        @endforeach --}}

                        <span class="text-sm">5 min</span>

                    </div>
                    {{-- title & excerpt --}}
                    <div class="flex flex-col justify-start gap-6">

                        <h3 class="text-2xl md:text-[28px] lg:text-3xl font-medium">testowy tytuł</h3>
                        <p>asdasdsadsadasdasdasdasdasdsadsadsdasdasd</p>

                        <x-ui.link href="#">Czytaj</x-ui.link>

                    </div>


                </div>
                <div class="w-1/3 h-full flex flex-col justify-start gap-6 group">
                    {{-- thumbnail --}}
                    <a href="#" class="overflow-hidden">
                        <img src="{{ $apartment->getThumbnailUrl() }}" alt="{{ $apartment->name }}"
                            class="group-hover:scale-110 duration-500 lg:h-[400px] object-cover w-full aspect-video"
                            width="624" height="400" loading="lazy">
                    </a>
                    {{-- categories & reading time --}}
                    <div class="flex justify-start items-center gap-5">

                        {{-- @foreach ($post->categories as $category)
                            <x-ui.link-btn wire:navigate :key="$category->slug" type='secondary' href="{{ $category->slug }}">{{ $category->title }}</x-ui.link-btn>
                        @endforeach --}}

                        <span class="text-sm">5 min</span>

                    </div>
                    {{-- title & excerpt --}}
                    <div class="flex flex-col justify-start gap-6">

                        <h3 class="text-2xl md:text-[28px] lg:text-3xl font-medium">testowy tytuł</h3>
                        <p>asdasdsadsadasdasdasdasdasdsadsadsdasdasd</p>

                        <x-ui.link href="#">Czytaj</x-ui.link>

                    </div>


                </div>
                <div class="w-1/3 h-full flex flex-col justify-start gap-6 group">
                    {{-- thumbnail --}}
                    <a href="#" class="overflow-hidden">
                        <img src="{{ $apartment->getThumbnailUrl() }}" alt="{{ $apartment->name }}"
                            class="group-hover:scale-110 duration-500 lg:h-[400px] object-cover w-full aspect-video"
                            width="624" height="400" loading="lazy">
                    </a>
                    {{-- categories & reading time --}}
                    <div class="flex justify-start items-center gap-5">

                        {{-- @foreach ($post->categories as $category)
                            <x-ui.link-btn wire:navigate :key="$category->slug" type='secondary' href="{{ $category->slug }}">{{ $category->title }}</x-ui.link-btn>
                        @endforeach --}}

                        <span class="text-sm">5 min</span>

                    </div>
                    {{-- title & excerpt --}}
                    <div class="flex flex-col justify-start gap-6">

                        <h3 class="text-2xl md:text-[28px] lg:text-3xl font-medium">testowy tytuł</h3>
                        <p>asdasdsadsadasdasdasdasdasdsadsadsdasdasd</p>

                        <x-ui.link href="#">Czytaj</x-ui.link>

                    </div>

                </div>

            </div>

        </x-section>

        <x-section>
            <div class="space-y-5">

                <h2 class="text-6xl font-medium">Kontakt</h2>
                <p class="text-lg">Entdecken Sie die Highlights dieser Unterkunft, welche wir für Sie entdecket haben.
                </p>
            </div>

            <div class="flex">

                <div class="w-1/2 flex flex-col justify-end items-start p-12 gap-4">
                    <x-iconpark-mapdraw  class="text-primary-400 w-8"/>

                    <div class="flex justify-center items-center gap-1">
                        <a class="text-xl font-semibold link-hover" href="{{$apartment->link}}">{{$apartment->name}}</a>
                        <x-iconpark-arrowrightup-o class="w-6 text-primary-400"/>


                    </div>
                    <span>{{$apartment->region}}</span>
                    <a href="">mail@gmail.com</a>

                </div>
                <div class="w-1/2">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2592.54735759338!2d20.004589194682037!3d49.47416679773687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4715e5905e21c0ed%3A0x159c133ae9b83572!2sMarketingMix!5e0!3m2!1spl!2spl!4v1721216542668!5m2!1spl!2spl"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="grayscale hover:grayscale-0 duration-500"></iframe>
                </div>
            </div>

        </x-section>

        <x-section>
            <div class="space-y-5">

                <h2 class="text-6xl font-medium">Zobacz podobne</h2>
                <p class="text-lg">Entdecken Sie die Highlights dieser Unterkunft, welche wir für Sie entdecket haben.
                </p>
            </div>

            <div class="flex justify-center gap-x-12">


                <div class="flex flex-col group w-1/3">
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
                <div class="flex flex-col group w-1/3">
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
                <div class="flex flex-col group w-1/3">
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

            </div>

        </x-section>

        <x-section class="bg-black">
tutaj pasuje coś opisać ze podhale jest wspaniałe i ze zachecamy do odwiedzania tego wspaniałego regionu
        </x-section>

    </x-slot>

</x-layouts.app>
