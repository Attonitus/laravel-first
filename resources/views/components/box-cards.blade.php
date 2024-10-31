<div class="box-cards p-4">
    <h5 class="text-center text-xl mb-4 text-black font-bold	">{{$title}}</h5>
    <div class="cards flex gap-4 flex-wrap items-center justify-center">
        @forelse ($cards as $card)
            <x-card-card-component :card="$card" />
        @empty
            
        @endforelse
    </div>
</div>