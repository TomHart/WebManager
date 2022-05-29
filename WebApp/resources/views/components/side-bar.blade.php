<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            Admin <b class="font-black">Jassa</b>
        </div>
    </div>


    <div class="menu is-menu-main">
        @foreach($sideBar as $section => $links)

        <p class="menu-label">{{$section}}</p>
        <ul class="menu-list">
            @foreach($links as $link)
            <li class="active">
                <a href="{{$link['link']}}">
                    <span class="icon"><i class="mdi mdi-{{$link['icon']}}"></i></span>
                    <span class="menu-item-label">{{$link['title']}}</span>
                </a>
            </li>
            @endforeach
        </ul>

        @endforeach


        <p class="menu-label">Examples</p>
        <ul class="menu-list">
            <li class="--set-active-tables-html">
                <a href="#">
                    <span class="icon"><i class="mdi mdi-table"></i></span>
                    <span class="menu-item-label">Tables</span>
                </a>
            </li>
            <li class="--set-active-forms-html">
                <a href="#">
                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                    <span class="menu-item-label">Forms</span>
                </a>
            </li>
            <li class="--set-active-profile-html">
                <a href="#">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    <span class="menu-item-label">Profile</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="mdi mdi-lock"></i></span>
                    <span class="menu-item-label">Login</span>
                </a>
            </li>
            <li>
                <a class="dropdown">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label">Submenus</span>
                    <span class="icon"><i class="mdi mdi-plus"></i></span>
                </a>
                <ul>
                    <li>
                        <a href="#void">
                            <span>Sub-item One</span>
                        </a>
                    </li>
                    <li>
                        <a href="#void">
                            <span>Sub-item Two</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <p class="menu-label">About</p>
        <ul class="menu-list">
            <li>
                <a href="https://therichpost.com" onclick="alert('Coming soon'); return false" target="_blank" class="has-icon">
                    <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
                    <span class="menu-item-label">Premium Demo</span>
                </a>
            </li>
            <li>
                <a href="https://therichpost.com" class="has-icon">
                    <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                    <span class="menu-item-label">About</span>
                </a>
            </li>
            <li>
                <a href="https://therichpost.com" class="has-icon">
                    <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                    <span class="menu-item-label">GitHub</span>
                </a>
            </li>
        </ul>
    </div>
</aside>