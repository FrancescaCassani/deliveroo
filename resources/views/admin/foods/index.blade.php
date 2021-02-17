@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Banner verifica deleted --}}
    @if (session('deleted'))
    <div class="alert alert-danger">
        {{ session('deleted') }} Eliminato con successo.
    </div>
    @endif

    @if ($foods->isEmpty())
        <p>Nessun piatto creato</p>
    @endif


    <a href="{{route('admin.foods.create')}}">Aggiungi piatto</a>
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
                @foreach ($foods as $food)
                    <tr>
                        <td>{{$food->id}}</td>
                        <td>{{$food->name}}</td>
                        <td>{{$food->created_at->format('d/m/Y')}}</td>
                        <td> <a class="btn btn-success" href="{{ route('admin.foods.show', $food->slug) }}">Mostra food</a></td>
                        {{-- <td> <a class="btn btn-primary" href="{{ route('admin.restaurants.edit', $restaurant->id) }}">Modifica</a></td> --}}
                        <td>
                            {{-- <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" class="btn btn-danger" value="Elimina">
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </ul>
</div>
@endsection
