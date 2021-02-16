@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$restaurant->name}}</h2>
        <p>{{$restaurant->vat_number}}</p>
        <p>{{$restaurant->description}}</p>
        <p>{{$restaurant->created_at->diffForHumans()}}</p>
        <img width="250" src="{{asset('storage/' . $restaurant->path_img)}}" alt="">

        <a href="{{route('admin.foods.index')}}">Read more</a>
    </div>


@endsection
