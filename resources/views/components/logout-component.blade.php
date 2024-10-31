<form method="POST" action="{{route('logout')}}">
    @csrf
    <button type="submit">
        <i class="fa-solid fa-right-from-bracket"></i> Logout
    </button>
</form>