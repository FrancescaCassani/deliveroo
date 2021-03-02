@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - Homepage</title>
@endsection

@section('content')
<div class="text-center">
    <h1>Homepage</h1>
    {{-- Barra di ricerca --}}
    <input class="imput-group" type="text" placeholder="Ricerca il ristorante" v-model='research' @keyup="searchRestaurant">
    {{-- Lista generi --}}
    <div class="container d-flex justify-content-center mt-4 mb-3">
        <ul class="list-group list-group-horizontal-sm">
            <li class="list-unstyled" role="button" v-for="genre in showGenres" @click="filterGenres(genre.type)">
                <img :src="'./img/asset/genres/' + genre.img + '.png'" :alt="genre.type">
                @{{genre.type}}
            </li>
        </ul>
    </div>
    <span class="badge badge-pill badge-success text-dark h5 ml-1" v-for="(genre, index) in genresFiter"> @{{genre}} <span role="button" @click="genreSelected(index)">X</span> </span>

    {{-- Controlo nessun ristorante presente --}}
    @if ($restaurants->isEmpty())
       <p>Nessun ristorante presente nella tua ricerca</p>
    @endif

    <h2 class="text-center pt-3 pb-3">I ristoranti nella tua zona</h2>
    <div class="container">
        <div class="show-restaurant">
            <span v-for="(restautant, i) in allRestaurants">
                <div class="container" v-if="restautant.slug == restaurantIndex">
                    <img :src="'../storage/' + restautant.path_img" class="card-img-top" :alt="restautant.name">
                    <h1>@{{restautant.name}}</h1>
                    <div v-for="food in foods" v-if="food.restaurant_id === restautant.id">
                        <h3>@{{food.name}}</h3> <span href="#" class="btn btn-primary" @click="addCart(food)">Aggiungi al carrello</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="hero row">
            <div class="col-sm mb-5" v-for="(restaurant, index) in allRestaurants" v-if="restaurant.visible == 1">
                <div class="card" style="width: 15rem">
                    <img :src="'../storage/' + restaurant.path_img" class="card-img-top" :alt="restaurant.name">
                    <div class="card-body">
                        <h5 class="card-title">@{{restaurant.name}}</h5>
                        <h5 class="card-title">@{{restaurant.restaurant_id}}</h5>
                        <a :href="'#' + restaurant.slug" @click="showRestaurant(restaurant)" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Footer --}}
{{-- <footer class="footer">
    <div class="box-ft scopri">
        <h3>Scopri Deliveroo</h3>
    </div>
    <div class="box-ft note"></div>
    <div class="box-ft aiuto"></div>
    <div class="box-ft deliveroo-app"></div>
</footer> --}}
@endsection
