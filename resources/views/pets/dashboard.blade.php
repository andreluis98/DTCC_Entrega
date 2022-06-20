@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas Ocorrencias</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
@if(count($pets) > 0)
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ocorrencia</th>
            <th scope="col">ONG Monitorando</th>
            <th scope="col">Ações</th>

        </tr>
    </thead>

        <tbody>
            @foreach($pets as $pet)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/pets/{{ $pet->id }}">{{$pet->title}}</a></td>
                    <td>MIAUJUDAMOS</td>
                    <td>
                        <a href="/pets/edit/{{$pet->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                        <form action="/pets/{{ $pet->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
<p>Nenhuma ocorrencia realizada para este usuario!<a href="/pets/create"> Realizar ocorrencia! </a></p>
@endif
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Resgates</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
@if(count($petsasparticipant) > 0)
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ocorrencia</th>
            <th scope="col">ONGS Monitorando</th>
            <th scope="col">Ações</th>

        </tr>
    </thead>

        <tbody>
            @foreach($petsasparticipant as $pet)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/pets/{{ $pet->id }}">{{$pet->title}}</a></td>
                    <td>{{count($pet->users) }}</td>
                    <td>
                    <form action="/pets/leave/{{$pet->id}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger delete-btn">
                        <ion-icon name="trash-outline"></ion-icon>Cancelar Resgate
                    </button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
<p>Você ainda não realizo nenhum resgate, <a href="/">Veja todas as ocorrencias</a></p>
@endif
</div>
@endsection
