<x-layouts.app>

    <x-slot name='header'>
        <div class="text-left max-w-screen-xl mx-auto  space-y-2 pt-10">
<div class="flex justify-center items-center gap-2">
@foreach ($post->categories as $category)
  <a wire:navigate href="{{ route('blog.index', ['category' => $category->slug]) }}">{{$category->title}}</a>
@endforeach
</div>
            <p class="text-sm">{{$post->getReadingTime()}} min</p>
            <h1 class="text-6xl">{{$post->title}}</h1>
            
        </div>
    </x-slot>

    <x-slot name='main'>
       
      <livewire:post-list/>


        





    </x-slot>


</x-layouts.app>