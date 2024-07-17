<x-section class=" bg-background-300">

    <x-heading subheading="Apartamenty" heading="Polecane apartamenty" />

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-12 py-16">

        @foreach ($apartments as $apartment)

            <x-apartment-card :apartment="$apartment" />
        @endforeach



</x-section>
