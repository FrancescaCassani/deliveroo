@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - Homepage</title>
@endsection

@section('content')
<div class="text-center">
    <h1>Homepage</h1>

    {{-- Controlo nessun ristorante presente --}}
    @if ($restaurants->isEmpty())
       <p>Nessun ristorante presente nella tua ricerca</p>
    @endif

    <h2 class="text-center pt-3 pb-3">I ristoranti nella tua zona</h2>
    <div class="container">
        <div class="hero row">
            {{-- @foreach ($restaurants as $restaurant)
                <div class="col-sm mb-5">
                    <div> --}}
                        {{-- <img width="250" src="{{ asset('storage/' . $restaurant->path_img) }}" alt="{{$restaurant->name}}"> --}}
                        {{-- <img width="250" src="{{ $restaurant->path_img }}" alt="{{$restaurant->name}}">
                        <h3>{{$restaurant->name}}</h3>
                        <a href="{{ route('restaurants.show', $restaurant->slug) }}">Show more</a>
                    </div>
                </div>
            @endforeach --}}
            <div v-for="restaurant in restaurants">
                <h3>@{{restaurant.name}}</h3> <br>
            </div>

            <div v-for="food in foods">
                <h3>@{{food.name}}</h3>
            </div>

            <div v-for="genre in genres">
                <h3>@{{genre.type}}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
