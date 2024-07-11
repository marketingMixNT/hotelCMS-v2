@props(['class'=>'','type' => 'primary', 'href' => '#'])




<a href="{{ $href }}"
    class="{{$class}} rounded-xl duration-500 hover:shadow-xl
     {{ $type === 'primary' ? ' bg-secondary-400 hover:bg-secondary-600   px-9 py-3 text-primary-400 md:text-lg' : '' }} 
        {{ $type === 'secondary' ? 'bg-gray-100 hover:bg-gray-200 px-4 py-[2px] text-sm' : '' }} 
       
    
    
    ">{{ $slot }}</a>
