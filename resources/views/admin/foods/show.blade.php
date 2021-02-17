@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$food->name}}</h2>
        <p>{{$food->ingredients}}</p>
        <p>{{$food->price}}</p>
        <p>{{$food->description}}</p>
        <p>{{$food->created_at->diffForHumans()}}</p>
        <img width="250" src="{{asset('storage/' . $food->path_img)}}" alt="">
    </div>


@endsection
