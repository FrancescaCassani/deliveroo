@extends('layouts.app')

@section('content')

    <div class="container">
        @if ($restaurants->isEmpty())
            <p>Nessun ristorante creato</p>
        @endif

        <ul>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th colspan=“3”></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restaurants as $restaurant)
                            <tr>
                                <td>{{$restaurant->id}}</td>
                                <td>{{$restaurant->name}}</td>
                                <td>{{$restaurant->created_at->format('d/m/Y')}}</td>
                                <td> <a class="btn btn-success" href="">Mostra</a></td>
                                <td> <a class="btn btn-primary" href="{{ route('admin.restaurants.edit', $restaurant->id) }}">Modifica</a></td>
                                <td> <a class="btn btn-danger" href="">Elimina</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </ul>
    </div>

@endsection