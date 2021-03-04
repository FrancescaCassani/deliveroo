<nav class="navbar navbar-expand-md navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand desk" href="{{ url('/') }}">
            <img src="{{ asset('img/asset/del-logo-2.png') }}" alt="Deliveroo">
        </a>

        <div class="navbar-nav">
           
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

        </div>
    </div>
</nav>