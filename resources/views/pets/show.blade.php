@extends('layouts.main')

@section('title', $pet->title)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/pets/{{$pet->image}}" class="img-fluid" alt="{{$pet->title}}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $pet->title }}</h1>
                <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{$pet->endereço}} . {{$pet->number}}</p>
                <p class="events-participants"><ion-icon name="people-outline"></ion-icon>ONG MIAUJUDAMOS</p>
                <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{$petOwner['name']}}</p>
                @if(!$hasUserJoined)
                <form action="/pets/join/{{$pet->id}}" method="POST">
                    @csrf
                <a href="/pets/join/{{$pet->id}}" 
                class="btn btn-primary" 
                id="event-submit"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                Realizar Resgate
                </a>
                </form> 
                @else
                    <p class="already-joined-msg">Você já solicitou o resgate do pet!</p>
                @endif
                <h3>O pet apresenta as seguintes fraturas/lesões:</h3>
                <ul id="items-list">
                    @foreach($pet->items as $items)
                        <li><ion-icon name="medkit-outline"></ion-icon><span>{{$items}}</span></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o Pet:</h3>
                <p class="event-description">{{$pet->description}}</p>
            </div>
        </div>
    </div>

@endsection