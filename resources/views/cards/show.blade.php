
<x-layout>
    <div class="border shadow-lg text-black flex-col">
        <div class="buttons flex justify-between items-center">
            <a class="p-4" href="{{url('/cards')}}"><i class="fa-solid fa-arrow-left"></i> Back to list cards</a>
            @can('update', $card)
            <div class="buttons-right flex gap-4">
                <x-buttonlink bg="bg-blue-500" url="{{route('cards.edit', $card->id)}}">Edit</x-buttonlink>
                <form method="POST" action="{{route('cards.destroy', $card->id)}}"
                    onsubmit="return confirm('Aree u sure that u want to delete this card?')" >
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-2 bg-red-500 text-white hover:bg-red-600 rounded-sm	 " type="submit">Delete</button>
                </form>
            </div>
            @endcan
        </div>
        <div class="primary-info flex ">
            <div class="img">
                <img src="/storage/{{$card->card_img}}" alt="{{$card->name}}">
            </div>
            <div class="descrip p-8 flex flex-col gap-4 flex-wrap">
                <h2 class="text-4xl font-bold">{{$card->name}}</h2>
                <p class="text-2xl">{{$card->description}}</p>

                <div class="flex gap-4">
                    <p class="p-2 px-12 bg-green-600 text-xl text-white font-bold">${{$card->value}}</p>
                    <a href="{{url('/cards/saved')}}"><button class="bg-pink-400 px-6 font-bold  text-white p-2"><i class="fa-solid fa-heart"></i> Save</button></a>

                </div>
            </div>
        </div>

        <div class="info bg-slate-300 flex flex-col items-center p-4">
            <p class="text-xl"><strong>Illustrator: </strong>{{$card->illustrator}}</p>

            <p class="text-xl"><strong>Rarity: </strong>{{$card->rarity}}</p>
            <p class="text-xl"><strong>Type: </strong>{{$card->type}}</p>
            <p class="text-xl"><strong>Condition: </strong>{{$card->condition}}</p>
            <p class="text-xl"><strong>Bidding: </strong>{{$card->bidding ? 'Yes' : 'No'}}</p>

            <p class="text-xl"><strong>Country: </strong>{{$card->country}}</p>
        </div>
    </div>
</x-layout>