@props(['url' => '/cards/create', 'block' => '',
'icon' => null, 'bg' => 'bg-white', 'bgHover' => 'bg-gray-300'])

<a href="{{$url}}" class=" {{$block}} {{$bg}} hover:{{$bgHover}} text-black px-4 
py-2 rounded hover:shadow-md transition duration-300">
    @if ($icon)
        <i class="fa fa-{{$icon}}"></i> 
    @endif
    {{$slot}}
</a>