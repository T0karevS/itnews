<header>
    <div class="header">
        <div class="logo_div">
            <a class="image__a" href="/">
                <img src="/img/svg/logo.svg" class="logo">
            </a>
        </div>
        <form method="get" class="search">
            <input type="text" name="search" class="header__search">
            <button type="submit" class="header__btn"></button>
            
            
            <!-- <div class="header__reg">
                <a href="../login"><img src="img/svg/user.svg" class="user_pic"></a>
                <p><a href="../login">войти</a></p>
            </div> -->
            
            @guest

                            @if (Auth::user()==null)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.login') }}">{{ __('Войти') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                            <a href="/user/{{ Auth::user()->id }}"><img class="pfp-min" src="/avatars/{{ Auth::user()->avatar }}"  alt="">    
                            </a><!-- <a id="navbarDropdown" class="nav-link dropdown-toggle text-white fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a> -->

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.logout') }}">
                                        {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
        </form>
    </div>
</header>