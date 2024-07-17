<x-section>

    <x-heading subheading="Kategorie" heading="Popularne Kategorie" />

    <div class="grid grid-cols-1 lg:grid-cols-2 h-[130vh] md:h-screen py-12 gap-4">





        <x-category-item href='#'
            style="background-image: url({{ asset($apartmentsCategories[0]->getThumbnailUrl()) }})"
            subheading="{{ $apartmentsCategories[0]->title }}" heading="{{ $apartmentsCategories[0]->title }}" />



        <div class="grid grid-cols-2 grid-rows-2 gap-4">

            @foreach ($apartmentsCategories->slice(1, 4) as $category)
            <x-category-item href='#' style="background-image: url({{ asset($category->getThumbnailUrl()) }})"
                subheading="{{ $category->title }}" heading="{{ $category->title }}" />
            @endforeach
          



        </div>
    </div>
    <div class="w-full flex justify-end">

        <a href='#' class="flex justify-center items-center">Zobacz wszystkie <x-iconpark-right
                class="w-6" /></a>
    </div>
</x-section>
