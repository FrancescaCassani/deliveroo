@extends('layouts.app')

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
            @foreach ($restaurants as $restaurant)
                <div class="col-sm mb-5">
                    <div>
                        <img width="250" src="{{ asset('storage/' . $restaurant->path_img) }}" alt="{{$restaurant->name}}">
                        <h3>{{$restaurant->name}}</h3>
                        <a href="{{ route('restaurants.show', $restaurant->slug) }}">Show more</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
