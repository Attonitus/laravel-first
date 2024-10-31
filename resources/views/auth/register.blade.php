<x-layout>
    <div class="border text-black px-2 py-4 max-w-96 mx-auto">
        <h1 class="text-center text-3xl font-bold">Register</h1>
        <form method="POST" action="{{route("register.store")}}">
            @csrf
            <x-inputcomponent name="name" placeholder="Manueh Swansea Hurr">
                Name
            </x-inputcomponent>
            <x-inputcomponent name="email" type="email" placeholder="ghost@mail.com">
                Email
            </x-inputcomponent>
            <x-inputcomponent name="password" type="password" placeholder="Not use P@$$w0rd...">
                Password
            </x-inputcomponent>
            <x-inputcomponent name="password_confirmation" type="password" placeholder="Same on password">
                Confirm Password
            </x-inputcomponent>
            <p><a href="{{route('login')}}">Already have a account? Click here!</a></p>
            <button
            type="submit"
            class="w-full bg-blue-500 hover:bg-blue-600 +
            text-white px-4 py-2 my-3 rounded focus:outline-none">
            Save
        </button>
        </form>
    </div>
    
</x-layout>