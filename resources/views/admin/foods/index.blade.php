@extends('layouts.app')

@section('page-title')
    <title>Deliveroo - I tuoi piatti</title>
@endsection

@section('content')
<div class="container">
    {{-- Banner verifica deleted --}}
    @if (session('deleted'))
    <div class="alert alert-danger">
        {{ session('deleted') }} Piatto eliminato con successo.
    </div>
    @endif

    @if ($foods->isEmpty())
        <p>Non è ancora stato creato nessun piatto!</p>
    @endif


    <div class="d-flex justify-content-start mb-5">
        <a class="btn btn-primary" href="{{route('admin.foods.create')}}">Aggiungi piatto</a>
    </div>
    <ul class="auth-container">
        <table class="table">
            <thead class="bg">
                <tr>
                    <th>ID</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome piatto</th>
                    <th scope="col">Creato</th>
                    <th scope="col">|</th>
                    <th colspan="10">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food)
                    <tr>
                        <th scope="row">{{$food->id}}</th>
                        <td><img width="80" src="{{asset('storage/' . $food->path_img)}}" alt=""></td>
                        <td>{{$food->name}}</td>
                        <td>{{$food->created_at->format('d/m/Y')}}</td>
                        <td> <a class="btn btn-primary" href="{{ route('admin.foods.show', $food->slug) }}">Mostra piatto</a></td>
                        <td> <a class="btn btn-warning" href="{{ route('admin.foods.edit', $food->id) }}">Modifica piatto</a></td>
                        <td>
                        <form action="{{ route('admin.foods.destroy', $food->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input type="submit" class="btn btn-danger" value="Elimina piatto">
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </ul>
</div>

@endsection
