@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - {{$food->name}}</title>
@endsection

@section('content')
<div class="container text-center">
    <h3 class="pb-4 text-center">Dettaglio del piatto</h3>
    <div class="auth-container mt-4">
        <li class="list-unstyled list-group-item">
            <div class="content">
                <h4 class="pb-2">{{$food->name}}</h4>
                <p>Ingredienti: {{$food->ingredients}}</p>
                <p>Prezzo: {{$food->price}}€</p>
                <p>Descrizione: {{$food->description}}</p>
            </div>

            <div class="image mb-3">
                <img width="250" src="{{asset('storage/' . $food->path_img)}}" alt="{{$food->name}}">
            </div>
        </li>
    </div>
@endsection
