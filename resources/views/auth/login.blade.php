<x-layout>
    <div class="border text-black px-2 py-4 max-w-96 mx-auto">
        <h1 class="text-center text-3xl font-bold">Login</h1>
        <form method="POST" action="{{route("login.auth")}}">
            @csrf
            <x-inputcomponent name="email" type="email" placeholder="ghost@mail.com">
                Email
            </x-inputcomponent>
            <x-inputcomponent name="password" type="password" placeholder="P@$$w0rd...">
                Password
            </x-inputcomponent>
            <p><a href="{{route('register')}}">Dont have a account yet? Create here!</a></p>
            <button
            type="submit"
            class="w-full bg-blue-500 hover:bg-blue-600 +
            text-white px-4 py-2 my-3 rounded focus:outline-none">
            Save
        </button>
        </form>
    </div>
    
</x-layout>