@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - {{$restaurant->name}}</title>
@endsection

@section('content')
<div class="hero-restaurant">
    <div class="hero-info">
        <h2>{{$restaurant->name}}</h2>
        <p class="lead mt-5">{{$restaurant->description}}</p>
    </div>
    <div class="hero-img">
        <img src="{{asset('storage/' . $restaurant->path_img)}}" alt="{{$restaurant->name}}">
    </div>
</div>

<div class="foods container">
    <ul class="food-list">
        @foreach ($restaurant->foods as $food)
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$food->name}}</h5>
                    <p class="card-text">{{$food->ingredients}}</p>
                    <a href="#" @click="addCart({{$food}})">Aggiungi al carrello</a>
                </div>
            </div>
        </div>
        @endforeach
    </ul>
</div>
@endsection
