@extends('layouts.app')

@section('content')

    <div class="container">
        @if ($restaurants->isEmpty())
            <p>Nessun ristorante creato</p>
        @endif

        <ul>
            @foreach ($restaurants as $restaurant)
                <li>{{$restaurant->name}}</li>
            @endforeach
        </ul>
    </div>

@endsection