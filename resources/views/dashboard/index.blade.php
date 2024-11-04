<x-layout>
    <div class="border text-black flex flex-col">
        <div class="">
            <h2 class="text-center text-2xl font-bold p-4">Profile Info</h2>

            @if($user->avatar)
                <div class="mt-2 flex justify-center">
                    <img src="{{asset('storage/'.$user->avatar)}}" alt="{{$user->name}}" class="w-32 h-32 object-cover">
                </div>

            @endif
            <form class="p-4 px-12" method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-inputcomponent placeholder="Update your name" name="name" value="{{old('name', $user->name)}}">Update name</x-inputcomponent> 
                <x-inputcomponent placeholder="Update your email" name="email" value="{{old('email', $user->email)}}">Update email</x-inputcomponent>
                <x-inputcomponent placeholder="Update your avatar" name="avatar" type="file" value="{{old('avatar', $user->avatar)}}">Update avatar</x-inputcomponent>

                    <button
                        type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 +
                        text-white px-4 py-2 my-3 rounded focus:outline-none">
                         Update
                    </button>
            </form> 
        </div>
        <div class="section">
            <h2 class="text-center text-2xl font-bold p-4">{{$user->name}}'s cards:</h2>
            <div class="flex gap-4 justify-center">
                @forelse ($cards as $card)
                    <x-card-card-component :card="$card" />
                @empty
                    <p class="bg-red-600">Not cards here unu</p>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>