@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Homepage</h1>
    {{-- Controlo nessun ristorante presente --}}
    {{-- @if ($restaurants ?? ''->isEmpty())
       <p>Nessun ristorante presente nella tua ricerca</p>
    @endif --}}
    
    <h2>Dettaglio Ristorante</h2>
        <ul class="container">
            {{$restaurant->description}}
        </ul>
</div>
@endsection