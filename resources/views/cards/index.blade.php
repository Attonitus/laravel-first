
<x-layout>
    <div class="p-2 flex gap-6 flex-wrap align-items-center justify-center">
        @forelse($cards as $card)
            <x-card-card-component :card="$card" />
        @empty
            <h2>No hay cartas unu</h2>
        @endforelse
    </div>
</x-layout>