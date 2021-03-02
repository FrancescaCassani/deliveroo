@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - {{$restaurant->name}}</title>
@endsection

@section('content')
<div class="text-center">
    <div class="jumbotron show-restaurant">
        <img src="{{asset('storage/' . $restaurant->path_img)}}" alt="{{$restaurant->name}}" class="bg-img">
        <div class="jumbotron-txt">
            <div class="container">
                <h1 class="display-4">{{$restaurant->name}}</h1>
                <p class="lead">Maggiori informazioni su questo ristorante</p>
            </div>
        </div>
    </div>
</div>
@endsection
