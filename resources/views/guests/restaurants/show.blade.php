@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - {{$restaurant->name}}</title>
@endsection

@section('content')
<div class="text-center">
    <div class="container">

        <div class="container">
            <h2>Dettaglio Ristorante</h2>
            <h1 class="pt-4">{{ $restaurant->title }}</h1>

        {{-- Ciclo controllo se l'immagine del ristorante è presente --}}
            @if (!empty($restaurant->path_img))
                <img class="mb-3" width="250" src="{{asset('storage/' . $restaurant->path_img)}}" alt="{{$restaurant->title}}">
            @else
                <img class="mb-3" width="250" src="{{asset('img/no-img.png')}}" alt="{{$restaurant->title}}">
            @endif

            <p>Descrizione: {{$restaurant->description}}</p>
            <p>Address: {{$restaurant->address}}</p>
            <p>Phone number: {{$restaurant->phone_number}}</p>

            @foreach ($restaurant->foods as $food)
                {{$food->name}}
            @endforeach
        </div>
    </div>


</div>
@endsection
