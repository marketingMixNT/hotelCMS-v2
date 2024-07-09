<x-layouts.app>

    <x-slot name='header'>
        @include('pages.home.partials.hero-header')

    </x-slot>

    <x-slot name='main'>
        @include('pages.home.partials.amenities-icons')
        @include('pages.home.partials.categories')






        <x-section class=" bg-background-300">

            <x-heading subheading="Kategorien" heading="Beliebte Kategorien" />

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-12 py-16">


                <x-apartment-card img="{{ asset('assets/icons/apartments.jpg') }}" title="A House"
                    location="Weiler, Voralberg — Österreich" price="123" link="#" />
                <x-apartment-card img="{{ asset('assets/icons/apartments.jpg') }}" title="A House"
                    location="Weiler, Voralberg — Österreich" price="123" link="#" />
                <x-apartment-card img="{{ asset('assets/icons/apartments.jpg') }}" title="A House"
                    location="Weiler, Voralberg — Österreich" price="123" link="#" />
                <x-apartment-card img="{{ asset('assets/icons/apartments.jpg') }}" title="A House"
                    location="Weiler, Voralberg — Österreich" price="123" link="#" />

        </x-section>

    </x-slot>


</x-layouts.app>
