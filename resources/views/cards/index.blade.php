
<x-layout>
    <div class=" flex py-4">
        <x-search />
    </div>
    <div class="p-2 flex gap-6 flex-wrap align-items-center justify-center">
        @forelse($cards as $card)
            <x-card-card-component :card="$card" />
        @empty
            <h2>No hay cartas unu</h2>
        @endforelse
    </div>
    {{$cards->links()}}
</x-layout>