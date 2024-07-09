@props(['type' => 'primary','href'=>'#'])




<a href="{{ $href }}"
    class="
     {{ $type === 'primary' ? ' bg-secondary-400 px-9 py-3 rounded-xl text-primary-400 md:text-lg' : '' }} 
        {{ $type === 'secondary' ? 'bg-white rounded-xl px-8 py-[2px]' : '' }} 
       
    
    
    ">{{ $slot }}</a>
