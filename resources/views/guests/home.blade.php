@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - Homepage</title>
@endsection

@section('content')
<div class="text-center">
    <h1>Homepage</h1>
    {{-- Barra di ricerca --}}
    <input type="text" placeholder="Ricerca il ristorante" v-model='research' @keyup="searchRestaurant">
    {{-- Lista generi --}}
    <ul class="list-group list-group-horizontal-sm">
        <li class="list-group-item" v-for="genre in showGenres" @click="filterGenres(genre)">@{{genre}}</li>
        <li class="list-group-item" @click="filterNone">Tutti</li>
    </ul>

    {{-- Controlo nessun ristorante presente --}}
    @if ($restaurants->isEmpty())
       <p>Nessun ristorante presente nella tua ricerca</p>
    @endif

    <h2 class="text-center pt-3 pb-3">I ristoranti nella tua zona</h2>
    <div class="container">
        <div class="show-restaurant">
            <span v-for="(restautant, i) in allRestaurants">
                <div class="container" v-if="restautant.id == restaurantIndex"> 
                    <img :src="restautant.path_img" class="card-img-top" :alt="restautant.name">
                    <h1>@{{restautant.name}}</h1>
                    <div v-for="food in foods" v-if="food.id === restautant.id">
                        <h3>@{{food.name}}</h3>
                    </div>
                    <div v-for="genre in genres" v-if="genre.id === restautant.id">
                        <h3>@{{genre.type}}</h3>
                    </div>
                </div>
            </span>
        </div>
        <div class="hero row">
            <div class="col-sm mb-5" v-for="(restaurant, index) in allRestaurants" v-if="restaurant.visible == 1">
                <div class="card" style="width: 15rem">
                    <img :src="restaurant.path_img" class="card-img-top" :alt="restaurant.name">
                    <div class="card-body">
                        <h5 class="card-title">@{{restaurant.name}}</h5>
                        <span @click="showRestaurant(index)" class="btn btn-primary">Show</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
