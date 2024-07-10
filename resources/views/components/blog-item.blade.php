{{-- <div class="flex justify-between items-center gap-6 group"> --}}
<div class="grid grid-cols-1 xs:grid-cols-5 gap-6 group xs:h-[230px] lg:h-auto lg:max-h-[200px]">

    <a href="#" class="overflow-hidden  h-full col-span-2"><img src="{{ asset('assets/img/blog.jpg') }}" alt=""
            class="group-hover:scale-110 duration-500 object-cover  w-full h-full "></a>

    <div class="flex flex-col justify-center items-start gap-2 lg:gap-8  col-span-3 w-full">
        <div class="flex justify-start items-center gap-2">
            <x-link-btn type='secondary' href="#">News</x-link-btn>
            <span>5 min</span>
        </div>
        <div class="flex flex-col justify-start  gap-6">
            <h3 class="text-xl">La Dolce Vita: Die besten Unterkünfte für Ihren Sommerurlaub in
                Italien
            </h3>

            <a href="#" class="flex justify-start items-center gap-2  text-sm lg:text-lg">Mehr erfahren
                <x-iconpark-right-o class="w-4" />

            </a>
        </div>
    </div>

</div>