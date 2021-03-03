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
        <div class="col-sm-6" v-for="food in foods">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@{{food.name}}</h5>
                    <p class="card-text">@{{food.ingredients}}</p>
                    <span @click="addCart(food)" href="#" class="btn btn-primary">Aggiungi al carrello</span>
                </div>
            </div>
        </div>
    </ul>
</div>
@endsection
