@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - {{$restaurant->name}}</title>
@endsection

@section('content')
{{-- HEADER --}}
@include('partials.header')

<div class="hero-restaurant col-sm-12 col-md-8 col-lg-4">
    <div class="hero-info">
        <h2 class="mb-5">{{$restaurant->name}}</h2>
        <div class="votes">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>

        @foreach ($restaurant->genres as $genre)
            <p class="d-inline">{{$genre->type}} •</p>
        @endforeach

        <p class="lead">{{$restaurant->address}}</p>
        <p class="lead">{{$restaurant->description}}</p>
    </div>

    <div class="hero-img mt-4">
        <img src="{{asset('storage/' . $restaurant->path_img)}}" alt="{{$restaurant->name}}">
    </div>
</div>


{{-- SHOW RISTORANTI GUESTS --}}
<section class="guest-bg">
    <div class="container">
        <div class="box-food">
            @foreach ($restaurant->foods as $food)
                <div class="box-detail col-sm-12 col-md-8 col-lg-4 mr-2 mt-3">
                    <div class="text">
                        <h5 >{{$food->name}}</h5>
                        <p >{{$food->ingredients}}</p>
                        <p >{{$food->price}} €</p>
                        <a class="btn btn-primary" href="#" @click="addCart({{$food}})">Aggiungi al carrello</a>
                    </div>

                    <div class="image">
                        @if (!empty($food->path_img))
                            <img class="mb-2 mt-2" height="80" src="{{asset('storage/' . $food->path_img)}}" alt="{{$food->name}}">
                        @else
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        {{-- SHOW CARRELLO LATERALE --}}
        <div class="basket-content">
            <ul class="list-group basket" style="width: 300px">
                <li
                class="d-flex justify-content-between list-unstyled basket-item"
                v-for="(product, index) in shopCart" width=100>
                    <p>@{{ product.name }}</p>
                    <p class="price-single-product">@{{ product.price }}</p>
                </li>


                <li class="list-unstyled total">Total: @{{ finalPrice }} €</li>
            </ul>
            <div class="pay">
                <a class="d-flex justify-content-center btn btn-primary" href="{{ route('pay') }}">Vai al pagamento</a>
            </div>
        </div>
    </div>
</section>







{{-- <div class="container">
    <div class="row">
        @foreach ($restaurant->foods as $food)
        <div class="col-sm-12 col-md-6 col-lg-4 text-center">
            <ul class="mt-4 list-unstyled list-group-item">
                <img class="mb-2 mt-2" width="160" height="170" src="{{asset('storage/' . $food->path_img)}}" alt="{{$food->name}}">
                <h5 class="card-text">{{$food->name}}</h5>
                <p class="card-text">{{$food->ingredients}}</p>
                <p class="card-text">{{$food->price}} €</p>
                <a href="#" @click="addCart({{$food}})">Aggiungi al carrello</a>
            </ul>
        </div>
        @endforeach
    </div>
</div> --}}

@endsection
