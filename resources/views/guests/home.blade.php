@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - Homepage</title>
@endsection

@section('content')
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
                    placeholder="Inserisci il ristorante" v-model='research' @keyup="searchRestaurant">
                    <a href="#"
                    class="btn btn-primary"
                    @click="searchRestaurant">Cerca</a>
                </div>
            </div>
        </div>
    </section>
</div>

















    {{-- Lista generi --}}
    <div class="container d-flex justify-content-center mt-4 mb-3">
        <ul class="list-group list-group-horizontal-sm">
            <li class="list-unstyled" role="button" v-for="genre in showGenres" @click="filterGenres(genre.type)">
                <img :src="'./img/asset/genres/' + genre.img + '.png'" :alt="genre.type">
                @{{genre.type}}
            </li>
        </ul>
    </div>
    <div class="genre-selected text-center">
        <span class="badge badge-pill badge-success text-dark h5 ml-1" v-for="(genre, index) in genresFiter"> @{{genre}} <span role="button" @click="genreSelected(index)">X</span> </span>
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
                        <a :href=`{{ route('restaurants.show', '') }}/${restaurant.slug}` class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Selezione di deliveroo --}}
    <section class="selection container">
        <h2>La selezione di deliveroo</h2>
        <div class="content">
            <div class="comfort-food">
                <img src="{{ asset('img/asset/comfort_food.png') }}" alt="Comfort_food">
                <p>I grandi classici che scaldano il cuore, perfetti in ogni momento.</p>
                <a href="#">Scopri Comfort food</a>
            </div>
            <div class="dolci-dessert">
                <img src="{{ asset('img/asset/dolci_dessert.png') }}" alt="Dolci_dessert">
                <p>Dolci piaceri per rendere la gionata ancora più gustosa.</p>
                <a href="#">Scopri Dolci e dessert</a>
            </div>
            <div class="perfect-to-share">
                <img src="{{ asset('img/asset/perfect_to_share.png') }}" alt="Perfect-to-share">
                <p>Serve una scusa per stare insieme? Ordina dai ristoranti che trasformeranno la tua serata in una vera festa.</p>
                <a href="#">Scopri perfetti da condividere</a>
            </div>
            <div class="exclusive-deliveroo">
                <img src="{{ asset('img/asset/exclusive_deliveroo.png') }}" alt="Exclusive-deliveroo">
                <p>I più famosi, i più buoni, i preferiti. Quelli che trovi solo su Deliveroo.</p>
                <a href="#">Scopri Esclusiva Deliveroo</a>
            </div>
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
