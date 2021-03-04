@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - Homepage</title>
@endsection

@section('content')
{{-- HEADER --}}
@include('partials.header')

{{-- Main --}}
<div class="image-bg">
    <section class="container">
        <div class="hero">
            <div class="content col-sm-12 col-md-8 col-lg-5">
                <h2>I piatti che ami, a domicilio.</h2>
                {{-- Barra di ricerca --}}
                <div class="search">
                    <p>Cerca i tuoi ristoranti preferiti</p>
                    <input
                    class="imput-group"
                    type="text"
                    placeholder="Cerca ristorante" v-model='research' @keyup="searchRestaurant">
                    <i class="fas fa-location-arrow"></i>
                    <a href="#"
                    class="btn btn-primary"
                    @click="searchRestaurant">Cerca</a>
                    <small class="lable-p">
                        <a class="nav-link" href="{{ route('login') }}"> 
                            {{ __('Accedi') }}
                        </a>
                        per gestire i tuoi ristoranti.
                    </small>
                </div>
            </div>
        </div>
    </section>
</div>



    {{-- Lista generi --}}
    <div class="container d-flex justify-content-center mt-4 mb-3">
        <ul class="list-group list-group-horizontal-sm">
            <li class="list-unstyled text-center" role="button" v-for="genre in showGenres" @click="filterGenres(genre.type)">
                <img :src="'./img/asset/genres/' + genre.img + '.png'" :alt="genre.type">
                <span class="text-uppercase font-weight-bold text-secondary"> @{{genre.type}}</span>
            </li>
        </ul>
    </div>
    <div class="genre-selected text-center">
        <span role="button" class="text-uppercase badge badge-pill badge-dark h5 ml-1 p-1 pl-2 pr-2" v-for="(genre, index) in genresFiter" @click="genreSelected(index)"> @{{genre}} </span>
    </div>

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
                        <h3>@{{food.name}}</h3> <span href="#" class="btn btn-primary" @click.prevent="addCart(food)">Aggiungi al carrello</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="hero row">
            <div class="col-sm mb-5" v-for="(restaurant, index) in allRestaurants" v-if="restaurant.visible == 1">
                <a class="text-decoration-none" :href=`{{ route('restaurants.show', '') }}/${restaurant.slug}`>
                    <div class="card text-center" style="width: 15rem">
                        <img :src="'../storage/' + restaurant.path_img" class="card-img-top" :alt="restaurant.name">
                        <div class="card-body">
                            <h5 class="card-title">@{{restaurant.name}}</h5>
                            <small>Consegna gratuita</small>
                            <h5 class="card-title">@{{restaurant.restaurant_id}}</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- Selezione di deliveroo --}}
    <section class="selection container">
        <h2>La selezione di deliveroo</h2>
        <div class="content">
            <div class="comfort-food">
                <div class="content-img">
                    <h3>Comfort food</h3>
                </div>
                <p>I grandi classici che scaldano il cuore, perfetti in ogni momento.</p>
                <a href="#">Scopri Comfort food</a>
            </div>
            <div class="dolci-dessert">
                <div class="content-img">
                    <h3>Dolci e dessert</h3>
                </div>
                <p>Dolci piaceri per rendere la gionata ancora più gustosa.</p>
                <a href="#">Scopri Dolci e dessert</a>
            </div>
            <div class="perfect-to-share">
                <div class="content-img">
                    <h3>Perfetti da condividere</h3>
                </div>
                <p>Serve una scusa per stare insieme? Ordina dai ristoranti che trasformeranno la tua serata in una vera festa.</p>
                <a href="#">Scopri perfetti da condividere</a>
            </div>
            <div class="exclusive-deliveroo">
                <div class="content-img">
                    <h3>Esclusiva Deliveroo</h3>
                </div>
                <p>I più famosi, i più buoni, i preferiti. Quelli che trovi solo su Deliveroo.</p>
                <a href="#">Scopri Esclusiva Deliveroo</a>
            </div>
        </div>
    </section>

    {{-- Section news --}}
    <section class="news container">
        <h2>Novità dalla nostra cucina</h2>
        <div>
            <img src="{{ asset('img/asset/deliveroo_per_aziende.png') }}" alt="Deliveroo per aziende">
        </div>
        <div>
            <img src="{{ asset('img/asset/app_promo.png') }}" alt="App promo">
        </div>
    </section>

    {{-- Section work with Deliveroo --}}
    <section class="work container">
        <h2>Lavora con Deliveroo</h2>
        <div class="content">
            <div class="box-work">
                <img src="{{ asset('img/asset/lavora_con_deliveroo.png') }}" alt="Lavora con noi">
            </div>
            <div class="box-work">
                <img src="{{ asset('img/asset/diventa_partner.png') }}" alt="Diventa partner">
            </div>
            <div class="box-work">
                <img src="{{ asset('img/asset/lavora_con_noi.png') }}" alt="Lavora con noi">
            </div>
        </div>
    </section>
</div>

{{-- Footer --}}
@include('partials.footer')
@endsection
