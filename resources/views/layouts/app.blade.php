<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('page-title')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Payment --}}
    <!-- includes the Braintree JS client SDK -->
    <script src="https://js.braintreegateway.com/web/dropin/1.26.0/js/dropin.min.js"></script>

    <!-- includes jQuery -->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script> --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Deliveroo
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                                <li class="nav-item position-relative" @click="showCart = !showCart">
                                    <a class="nav-link" href="#"><i class="fas fa-cart-plus"></i></a>
                                    <ul v-if='showCart' class="position-absolute mt-4" style="width: 250px">
                                        <li v-for="(product, index) in shopCart" width=100>@{{ product.name }} @{{ product.price }}</li>
                                        <li>Total: @{{ finalPrice }}</li>
                                    </ul>
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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="dropin-container"></div>
                <button id="submit-button">Request payment method</button>
            </div>
        </div>
    </div>

    {{-- Payment --}}
    {{-- <script>var button = document.querySelector('#submit-button');braintree.dropin.create({authorization: "{{ Braintree_ClientToken::generate() }}",container: '#dropin-container'}, function (createErr, instance) {button.addEventListener('click', function () {instance.requestPaymentMethod(function (err, payload) {$.get('{{ route('payment.make') }}', {payload}, function (response) {if (response.success) {alert('Payment successfull!');} else {alert('Payment failed');}}, 'json');});});});</script>
     --}}

    {{-- PROVA PAYMENT --}}
     <script>
        var button = document.querySelector('#submit-button');
      
        braintree.dropin.create({
          // Insert your tokenization key here
          authorization: 'sandbox_tv4jr93b_z3djsm2w4fpsnkqy',
          container: '#dropin-container'
        }, function (createErr, instance) {
          button.addEventListener('click', function () {
            instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
              // When the user clicks on the 'Submit payment' button this code will send the
              // encrypted payment information in a variable called a payment method nonce
              $.ajax({
                type: 'POST',
                url: '/checkout',
                data: {'paymentMethodNonce': payload.nonce}
              }).done(function(result) {
                // Tear down the Drop-in UI
                instance.teardown(function (teardownErr) {
                  if (teardownErr) {
                    console.error('Could not tear down Drop-in UI!');
                  } else {
                    console.info('Drop-in UI has been torn down!');
                    // Remove the 'Submit payment' button
                    $('#submit-button').remove();
                  }
                });
      
                if (result.success) {
                  $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
                } else {
                  console.log(result);
                  $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
                }
              });
            });
          });
        });
      </script>

    {{-- JS --}}
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
