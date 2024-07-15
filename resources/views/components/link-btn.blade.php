@props(['class' => '', 'type' => 'primary', 'href' => '#'])




<a {{$attributes}} href="{{ $href }}"
    class=" duration-500 hover:shadow-xl
     {{ $type === 'primary' ? ' bg-secondary-400 hover:bg-secondary-600   px-9 py-3 text-primary-400 md:text-lg  rounded-xl' : '' }} 
        {{ $type === 'secondary' ? 'bg-gray-100 hover:bg-gray-200 px-4 py-[2px] text-sm  rounded-xl' : '' }} 
        {{ $type === 'third' ? 'bg-white border border-black hover:bg-gray-100 px-6 py-2 rounded-full' : '' }} 
       {{ $class }}
    
    
    ">{{ $slot }}</a>
