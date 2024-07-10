<x-layouts.app>

    <x-slot name='header'>
        @include('pages.home.partials.hero-header')

    </x-slot>

    <x-slot name='main'>
        @include('pages.home.partials.amenities-icons')
        @include('pages.home.partials.categories')
        @include('pages.home.partials.apartments')
        @include('pages.home.partials.map')
        @include('pages.home.partials.cta')
        @include('pages.home.partials.about')
        @include('pages.home.partials.testimonial')


        <x-section>

            <x-heading subheading="Blog" heading="Reise-Inspirationen" />


            <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-12 sm:gap-y-12 lg:gap-y-0  lg:gap-x-8 mt-16">


                <div class="w-full h-full flex flex-col justify-start  gap-6 group">

                    <a href="" class="overflow-hidden">
                        <img src="{{ asset('assets/img/blog.jpg') }}" alt=""
                            class="group-hover:scale-110 duration-500 lg:h-[400px] object-cover">
                    </a>

                    <div class="flex justify-start items-center gap-2">
                        <x-link-btn type='secondary' href="#">News</x-link-btn>
                        <span>5 min</span>
                    </div>

                    <div class="flex flex-col justify-start  gap-6">
                        <h3 class="text-3xl">La Dolce Vita: Die besten Unterkünfte für Ihren Sommerurlaub in Italien
                        </h3>
                        <p>Stellen Sie sich vor: ein Glas lokalen Weins, umgeben von sanften Hügeln, historischer
                            Architektur und dem sanften Summen der Zikaden. Italien ruft, und diesen Sommer haben
                            vier
                            atemberaubende Unterkünfte unsere Aufmerksamkeit erregt, die alle eine einzigartige
                            Mischung
                            aus Luxus, Komfort und authentischem italienischem Charme versprechen.</p>

                        <a href="#" class="flex justify-start items-center gap-2">Mehr erfahren
                            <x-iconpark-right-o class="w-4" />

                        </a>
                    </div>


                </div>




                <div class="grid grid-cols-1 grid-rows-3 gap-y-6 lg:gap-y-0">

                   <x-blog-item/>
                   <x-blog-item/>
                   <x-blog-item/>
                


                </div>




            </div>

        </x-section>





    </x-slot>


</x-layouts.app>
