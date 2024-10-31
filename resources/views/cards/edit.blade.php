<x-layout>
    <x-slot name="title">Edit card</x-slot>
        <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
            <form
                method="POST"
                action="{{route('cards.update', $card->id)}}"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <h2 class="text-3xl font-bold mb-6 text-center text-gray-500">Edit card</h2>

                <x-inputcomponent type="text" name="name" 
                placeholder="Charizard V max" :value="old('name', $card->name)" >Name</x-inputcomponent>

                <div class="mb-4">
                    <label class="block text-gray-700" for="description">Description</label>
                    <textarea
                        cols="30"
                        rows="7"
                        id="description"
                        name="description"
                        class="w-full px-4 py-2 border rounded focus:outline-none  text-black  @error('description') border-red-500 @enderror"
                        placeholder="Sleeve -> toploader, shipping free 24/7"
                    >{{old('description', $card->description)}}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm my-1">{{$message}}</p>
                    @enderror
                </div>

                <x-inputcomponent type="number" name="value" 
                placeholder="$10" :value="old('value', $card->value)" >Value</x-inputcomponent>

                <x-inputcomponent type="text" name="illustrator" 
                placeholder="Illustrator name or alias" :value="old('illustrator', $card->illustrator)">Illustrator</x-inputcomponent>

                <x-inputselectcomponent :options='["Normal", "Holo", "Special"]' :value="old('rarity', $card->rarity)" name="rarity" >
                    Rarity
                </x-inputselectcomponent>

                <x-inputselectcomponent :options='["Normal", "Water", "Grass",
                "Fire", "Psych", "Steel", "Dragon", "Fight", "Poison"]' :value="old('card_type', $card->card_type)" name="card_type" >
                    Card Type
                </x-inputselectcomponent>

                <x-inputselectcomponent :options='["Poor", "Good", "Perfect"]' :value="old('condition', $card->condition)" name="condition" >
                    Condition
                </x-inputselectcomponent>

                <x-inputselectcomponent :options='["Yes", "No"]' name="bidding" :value="old('bidding', $card->bidding)" >
                    Bidding?
                </x-inputselectcomponent>


                <x-inputcomponent type="text" name="country" :value="old('country', $card->country)"
                placeholder="France">Country</x-inputcomponent>


                <x-inputcomponent type="file" name="card_img"
                placeholder="">Card Image</x-inputcomponent>

                <button
                    type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 +
                    text-white px-4 py-2 my-3 rounded focus:outline-none">
                    Save
                </button>
            </form>
        </div>
</x-layout>