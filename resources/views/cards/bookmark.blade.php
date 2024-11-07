<x-layout>
    <h2 class="text-3xl text-center mb-4 font-bold border border-gray-300 text-black p-3">
        Liked Cards!
    </h2>

    <div class="flex gap-4 justify-center">
        @forelse ($bookmarks as $bookmark)
            <x-cardcardcomponent :card="$bookmark" />
        @empty
            <p class="text-gray-500 text-center">Go and like some cards</p>
        @endforelse
    </div>
</x-layout>