@props(['card'])

<div class="w-52 bg-white text-black p-2 border shadow-xl">
    <div class="card-image block">
        <img src="/storage/{{$card->card_img}}" alt="{{$card->name}}">
    </div>
    <div class="card-text m-2">
        <h4 class="m-4 font-bold" >{{$card->name}}</h4>
        <x-buttonlink  icon="circle-info" bg="bg-cyan-400" bgHover="bg-cyan-500" block="block" url="/cards/{{$card->id}}">Details</x-buttonlink>
    </div>
</div>