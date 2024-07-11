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
        @include('pages.home.partials.blog')


        





    </x-slot>


</x-layouts.app>
