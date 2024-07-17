<x-layouts.app title="Odkryj Skandynawię - Atrakcje, Apartamenty, Hotele" description="Poznaj niezapomniane piękno Skandynawii z Saga Fiordów. Oferujemy przewodniki po atrakcjach turystycznych oraz szeroki wybór apartamentów i hoteli w Norwegii, Szwecji, Finlandii i Danii. Planuj swoją podróż z nami i odkryj magię północnych fiordów!">

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
        @include('pages.home.partials.blog')


        





    </x-slot>


</x-layouts.app>
