<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>

                        <div class="header__top__right__auth">
                            @if (!empty(Auth::user()->name))
                                <div class="header__top__right__language ml-5">
                                    <div>{{ Auth::user()->name }}</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li>
                                            <a href="{{ route('home') }}"> Profile</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('my.order') }}"> My Order</a>
                                        </li>
                                        <li> <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>

                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('home.page') }}"><img src="{{ asset('Frontend') }}/img/logo.png"
                            alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class=" {{ Route::currentRouteName() == 'home.page' ? 'active' : '' }} "><a
                                href="{{ route('home.page') }}">Home</a></li>
                        <li class=" {{ Route::currentRouteName() == 'shop.page' ? 'active' : '' }}"><a
                                href="{{ route('shop.page') }}">Shop</a></li>
                        {{-- <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="{{route('shop.details.page')}}">Shop Details</a></li>
                                <li><a href="{{route('shoping.cart.page')}}">Shoping Cart</a></li>
                                <li><a href="{{route('checkout.page')}}">Check Out</a></li>
                                <li><a href="{{route('blog.details.page')}}">Blog Details</a></li>
                            </ul>
                        </li> --}}
                        <li class=" {{ Route::currentRouteName() == 'blog.page' ? 'active' : '' }} "><a
                                href="{{ route('blog.page') }}">Blog</a></li>
                        <li class=" {{ Route::currentRouteName() == 'contact.page' ? 'active' : '' }} "><a
                                href="{{ route('contact.page') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"></i>
                                <span>{{ count((array) session('cart')) }}</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>

    </div>
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    </div>
</header>
