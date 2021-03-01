<nav class="navbar navbar-expand-md navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/asset/del-logo.png') }}" alt="Deliveroo">
        </a>

        <div class="navbar-nav">
            <a class="btn btn-light" href="{{ route('login') }}">
                <i class="fas fa-home"></i>
                {{ __('Registrati o Accedi') }}
            </a>

            <div @click="showMenu = !showMenu" class="btn btn-light">
                <i class="fas fa-bars"></i>
                Menu
            </div>
        </div>

        <transition name="slide-down-fade">
            <div v-if="showMenu" class="menu" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('img/asset/del-logo-2.png') }}" alt="Deliveroo">
                        </a>
                    </li>
                    <li>
                        <a @click="showMenu = !showMenu">
                            <i class="fas fa-times"></i>
                        </a>
                    </li>
                </ul>
    
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                            </li>
                        @endif
                            <li class="nav-item position-relative" @click="showCart = !showCart">
                                <a class="nav-link" href="#"><i class="fas fa-cart-plus"></i></a>
                                <ul v-if='showCart' class="position-absolute mt-4" style="width: 250px">
                                    <li v-for="(product, index) in shopCart" width=100>@{{ product.name }} @{{ product.price }}</li>
                                    <li>Total: @{{ finalPrice }}</li>
                                </ul>
                                <a href="{{ route('pay') }}">Vai al pagamento</a>
                            </li>
                        @else
    
                        {{-- <li class="nav-item dropdown">
                            <a href="{{route('admin.home')}}" class="nav-link">Dashboard</a>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a href="{{route('admin.restaurants.index')}}" class="nav-link">I tuoi ristoranti</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="{{route('admin.restaurants.create')}}" class="nav-link">Aggiungi</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
    
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </transition>
    </div>
</nav>