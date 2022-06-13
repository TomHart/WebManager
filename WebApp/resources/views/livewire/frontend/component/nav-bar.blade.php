<div class="navbar">
    <ul class="navbar__links">
        <li class="navbar__link navbar__link--active">
            <a href="{{route('landing')}}">
                Home
            </a>
        </li>

        @isAdmin
        <li class="navbar__link">
            <a href="{{route('dashboard')}}">
                Dashboard
            </a>
        </li>
        <li class="navbar__link">
            <a href="{{route('logout')}}">
                Logout
            </a>
        </li>
        @elseIsAdmin
        @if(Route::has('login'))
            <li class="navbar__link">
                <a href="{{route('login')}}">
                    Login
                </a>
            </li>
        @endif
        @endIsAdmin
    </ul>
</div>
