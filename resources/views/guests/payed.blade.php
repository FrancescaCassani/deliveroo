@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - Homepage</title>
@endsection

@section('content')

<h2>Pagamento avvenuto con successo</h2>
<a href="{{route('home')}}">Torna alla homw</a>

@endsection
