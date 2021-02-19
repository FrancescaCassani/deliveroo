@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - {{$restaurant->name}}</title>
@endsection

@section('content')
    <div class="container">
        <h2>{{$restaurant->name}}</h2>
        @foreach($restaurant->genres as $genre)
            <small>{{$genre->type}}</small>
        @endforeach
        <p>{{$restaurant->vat_number}}</p>
        <p>{{$restaurant->description}}</p>
        <p>{{$restaurant->created_at->diffForHumans()}}</p>
        <img width="250" src="{{asset('storage/' . $restaurant->path_img)}}" alt="">

        <a class="btn btn-success" href="{{route('admin.foods.index')}}">I tuoi piatti</a>
    </div>


@endsection
