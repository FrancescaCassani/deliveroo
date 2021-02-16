@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Homepage</h1>
    {{-- Controlo nessun ristorante presente --}}
    {{-- @if ($restaurants ?? ''->isEmpty())
       <p>Nessun ristorante presente nella tua ricerca</p>
    @endif --}}
    
    <h2>I ristoranti nella tua zona:</h2>
        <ul class="container">
            @foreach ($restaurants as $restaurant)
                <li class="list-unstyled list-group-item">
                    <div>
                        <img width="250" src="{{ asset('storage/' . $restaurant->path_img) }}" alt="{{$restaurant->name}}">
                        {{-- verificare ciclo controllo img --}}
                    </div>
                    <div>
                        {{$restaurant->name}}
                    </div>
                </li>
            @endforeach
        </ul>
</div>
@endsection
