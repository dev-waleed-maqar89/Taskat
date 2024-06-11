<nav class="navbar-container">
    <ul class="main-navbar">
        @auth
            <li><a class="navbar-link" href="{{ route('homePage') }}">
                    @if (auth()->user()->image)
                        <img src="/storage/{{ auth()->user()->image }}" alt="user image" class="navbar-image">
                    @else
                        <img src="{{ asset('images/noImage.png') }}" alt="user image" class="navbar-image">
                    @endif
                    {{ auth()->user()->name }}
                </a></li>
            <li><a class="navbar-link" href="/logout">Logout</a></li>
        @else
            <li><a class="navbar-link" href="/register">register</a></li>
        @endauth
    </ul>
</nav>
