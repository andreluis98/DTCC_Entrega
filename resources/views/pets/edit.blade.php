@extends('layouts.main')

@section('title', 'Editando: ' . $pet->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{$pet->title}}</h1>
    <form action="/pets/update/{{$pet->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do pet:</label>
            <input type="file" id="image" name="image" class="form-control-file"> 
            <img src="/img/pets/{{$pet -> image}}" alt="{{$pet->title}}" class="image-preview">
        </div>
        <div class="form-group">
            <label for="title">Ocorrencia</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Informe-nos qual a sua ocorrencia" value="{{$pet-> title}}"> 
        </div>
        <div class="form-group">
            <label for="date">Data em que viu o pet nesse local?</label>
            <input type="date" class="form-control" id="date" name="date" value="{{$pet->date->format('Y-m-d')}}"> 
        </div>
        
        <!--<div class="form-group">
            <label for="title">Nome do solicitante</label>
            <input type="text" class="form-control" id="nomeSol" name="nomeSol" placeholder="Digite o seu nome"> 
        </div>
        <div class="form-group">
            <label for="title">Sobrenome</label>
            <input type="text" class="form-control" id="SobrenomeSol" name="SobrenomeSol" placeholder="Digite o seu sobrenome"> 
        </div>-->
        <div class="form-group">
            <label for="title">Contato</label>
            <input type="text" class="form-control" id="contato" name="contato" placeholder="Email/Telefone/Celular" value="{{$pet->contato}}"> 
        </div>
        <div class="form-group">
            <label for="title">Endereço</label>
            <input type="text" class="form-control" id="endereço" name="endereço" placeholder="Digite  a rua que está o pet" value="{{$pet->endereço}}"> 
        </div>
        <div class="form-group">
            <label for="title">Numero</label>
            <input type="text" class="form-control" id="number" name="number" placeholder="Numero da rua/casa/etc.." value="{{$pet->number}}"> 
        </div>
        <div class="form-group">
            <label for="title">Complemento</label>
            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Digite o complemento se necessario" value="{{$pet->complemento}}"> 
        </div>
        <div class="form-group">
            <label for="title">Ponto de referencia</label>
            <input type="text" class="form-control" id="refere" name="refere" placeholder="Digite um ponto de referencia" value="{{$pet->refere}}"> 
        </div>
        <div class="form-group">
            <label for="title">Cidade</label>
            <select name="city" id="city" class="form-control">
                <option value="0">São Paulo</option>
            </select> 
        </div>
        <div class="form-group">
            <label for="title">Qual o pet?</label>
            <select name="category" id="category" class="form-control">
                <option value="0">Cachorro</option>
                <option value="1" {{ $pet->category == 1 ? "selected='selected'" : ""}}>Gato</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Sexo do pet?</label>
            <select name="sex" id="sex" class="form-control">
                <option value="0">Macho</option>
                <option value="1" {{ $pet->sex == 1 ? "selected='selected'" : "" }}>Femea</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Descrição</label>
            <textarea name="description" id="description"  class="form-control" placeholder="Nos informe algumas caracteristicas do pet, se está machucado entre outras.">{{$pet->description}}</textarea>
           
        </div>
        <div class="form-group">
        <label for="title">O pet apresenta alguma dessas fraturas/lesões?</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Pata Quebrada">Pata Quebrada
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Olho Machucado">Olho Machucado
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Lesão na coluna">Lesão na coluna
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Sangramento">Sangramento
            </div>
            
           
        </div>
        <input type="submit" class="btn btn-primary" value="Editar ocorrencia">
    </form>
</div>

@endsection