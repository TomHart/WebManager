<div class="frontend-navbar">
    <ul class="frontend-navbar__links">
        <li class="frontend-navbar__link frontend-navbar__link--active">
            <a href="{{route('landing')}}">
                Home
            </a>
        </li>

        @isAdmin
        <li class="frontend-navbar__link">
            <a href="{{route('dashboard')}}">
                Dashboard
            </a>
        </li>
        <li class="frontend-navbar__link">
            <a href="{{route('logout')}}">
                Logout
            </a>
        </li>
        @elseIsAdmin
        @if(Route::has('login'))
            <li class="frontend-navbar__link">
                <a href="{{route('login')}}">
                    Login
                </a>
            </li>
        @endif
        @endIsAdmin
    </ul>
</div>
