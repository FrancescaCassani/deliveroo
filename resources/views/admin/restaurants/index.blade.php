@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - Ristoranti</title>
@endsection

@section('content')

    <div class="container">
        {{-- Banner verifica deleted --}}
        @if (session('deleted'))
        <div class="alert alert-danger">
            {{ session('deleted') }} Eliminato con successo.
        </div>
        @endif

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
                            <td> <a class="btn btn-success" href="{{ route('admin.restaurants.show', $restaurant->slug) }}">Mostra</a></td>
                            <td> <a class="btn btn-primary" href="{{ route('admin.restaurants.edit', $restaurant->id) }}">Modifica</a></td>
                            <td>
                                <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" class="btn btn-danger" value="Elimina">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </ul>
    </div>

@endsection