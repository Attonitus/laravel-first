@props(['url'=>"",'active'=>false, 'icon'=> null, 'mobile' => false])

@if($mobile)
    <a href="{{$url}}" class="block px-4 py-2 hover:bg-gray-500 {{$active ?  "text-yellow-200" : ""}}">
        @if($icon)
            <i class="fa fa-{{$icon}}"></i>         
        @endif
        {{$slot}}
    </a>
@else
    <a href="{{$url}}" class="text-white hover:underline py-2 {{$active ?  "text-yellow-200" : ""}}">
        @if($icon)
            <i class="fa fa-{{$icon}}"></i>         
        @endif
        {{$slot}}
    </a>
@endif

