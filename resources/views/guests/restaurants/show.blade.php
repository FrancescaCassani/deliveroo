@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - {{$restaurant->name}}</title>
@endsection

@section('content')
{{-- HEADER --}}
@include('partials.header')

<div class="hero-restaurant">
    <div class="hero-info">
        <h2>{{$restaurant->name}}</h2>

        @foreach ($restaurant->genres as $genre)
            <p>{{$genre->type}}</p>
        @endforeach

        <p class="lead mt-5">{{$restaurant->address}}</p>
        <p class="lead">{{$restaurant->description}}</p>
    </div>

    <div class="hero-img">
        <img src="{{asset('storage/' . $restaurant->path_img)}}" alt="{{$restaurant->name}}">
    </div>
</div>



<section class="guest-bg">
    <div class="container">
        <div class="box-food">
            @foreach ($restaurant->foods as $food)
                <div class="box-detail mr-5 ">
                    <div class="text">
                        <h5 >{{$food->name}}</h5>
                        <p >{{$food->ingredients}}</p>
                        <p >{{$food->price}} €</p>
                        <a class="btn btn-primary" href="#" @click="addCart({{$food}})">Aggiungi al carrello</a>
                    </div>

                    <div class="image">
                        <img class="mb-2 mt-2" width="160" height="170" src="{{asset('storage/' . $food->path_img)}}" alt="{{$food->name}}">
                    </div>
                </div>
            @endforeach
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
