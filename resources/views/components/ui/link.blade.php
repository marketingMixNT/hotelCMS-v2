
@props(['back' => false, 'href' => '#','class'=>''])
<a href="{{ $href }}" class="flex justify-start items-center gap-2 link-hover w-fit {{$class}}">

    @if ($back)
        <x-iconpark-left-o class="w-4" />
    @endif
    {{ $slot }}

    @if (!$back)
        <x-iconpark-right-o class="w-4" />
    @endif
</a>
