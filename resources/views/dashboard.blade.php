@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas Ocorrencias</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
@if(count($pets) > 0)
@else
<p>Nenhuma ocorrencia realizada para este usuario!<a href="/pets/create">Realizar ocorrencia</a></p>
@endif
</div>
@endsection
