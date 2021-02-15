@extends('layouts.app')

@section('content')

    <div class="container">
        @if ($restaurants->isEmpty())
            <p>Nessun ristorante creato</p>
        @endif
    </div>

@endsection