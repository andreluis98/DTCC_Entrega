@extends('layouts.main')

@section('title', 'MIAUJUDA')

@section('content')

<div id="search-container" class="col-md-12">
        <h1></h1>
        <form action="">
               
        </form>
</div>
<div id="events-container" class="col-md-12">
        <h2>Pets</h2>
        <p class="subtitle">Veja Abaixo os pets que se encontrarm em situação de rua e necessitam de sua ajuda!</p>
        <div id="card-container" class="row">
                @foreach($pets as $pet)
                <div class="card col-md3">
                        <img src="/img/pets/{{$pet->image}}" alt="{{ $pet->title }}">
                        <div class="card-body">
                                <p class="card-date">{{ date('d/m/Y', strtotime($pet->date)) }}</p>
                                <h5 class="card-title">{{ $pet->title }}</h5>
                                <p class="card-participants">ONG Miaujudamos</p>
                                <a href="/pets/{{$pet->id}}" class="btn btn-primary">Saber mais</a>

                        </div>
                </div>
                @endforeach
                @if(count($pets) == 0)
                <p>Não realizamos nenhum resgate até o momento!</p>
                @endif
        </div>

</div>

@endsection
