<header class="bg-gray-700 text-white p-4 mb-4">
    <div class="container mx-auto flex justify-between items-center">

        <h1 class="text-3xl font-semibold">
            <a href="{{url("/")}}"><i class="fa-solid fa-shop"></i> CardMarket</a>
        </h1>

        <nav class="hidden lg:flex items-center space-x-4">
            <x-navlink url="/cards" :active="request()->is('cards')">All cards</x-navlink>
            @auth
            <x-navlink url="/cards/saved" :active="request()->is('cards/saved')">Saved cards</x-navlink>
            <x-navlink url="/dashboard" :active="request()->is('cards/saved')" icon="gauge">Dashboard</x-navlink>
            <x-logout-component />
            <x-buttonlink icon="edit" url="/cards/create">Create Card</x-buttonlink>
            <div>
                <a href="{{route('dashboard')}}">
                    @if(Auth::user()->avatar)
                        <img src="{{asset('storage/'.Auth::user()->avatar)}}" alt="{{Auth::user()->name}}"
                        class="w-10 h-10 object-cover">
                    @else
                        <img src="{{asset('storage/avatars/avatar-default.png')}}" alt="Default image"
                        class="w-10 h-10 object-cover">
                    @endif
                </a>
            </div>
            @else
            <x-navlink url="/login" :active="request()->is('login')">Login</x-navlink>
            <x-navlink url="/register" :active="request()->is('register')" icon="user">Register</x-navlink>
            @endauth
        </nav>

        <button id="hamburger" class="text-white lg:hidden flex items-center">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <nav id="mobile-menu" class="lx:hidden hidden bg-gray-700 text-white mt-5 pb-4 space-y-2">
        <x-navlink url="/cards" mobile="true" :active="request()->is('cards')">All cards</x-navlink>
        @auth
        <x-navlink url="/cards/saved" mobile="true" :active="request()->is('cards/saved')">Saved Cards</x-navlink>
        <x-navlink url="/dashboard" mobile="true" icon="gauge" :active="request()->is('dashboard')">Dashboard</x-navlink>
        <x-logout-component />
        <x-buttonlink icon="edit" block="block" url="/cards/create">Create Job</x-buttonlink>
        @else
        <x-navlink url="/login" mobile="true" :active="request()->is('login')">Login</x-navlink>
        <x-navlink url="/register" mobile="true" icon="user" :active="request()->is('register')">Register</x-navlink>
        @endauth
    </nav>

</header>