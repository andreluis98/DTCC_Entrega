@extends('layouts.main')

@section('title', 'Realizar Ocorrencia')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Realize sua ocorrencia</h1>
    <form action="/pets" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do pet:</label>
            <input type="file" id="image" name="image" class="form-control-file"> 
        </div>
        <div class="form-group">
            <label for="title">Ocorrencia</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Informe-nos qual a sua ocorrencia"> 
        </div>
        <div class="form-group">
            <label for="date">Data em que viu o pet nesse local?</label>
            <input type="date" class="form-control" id="date" name="date"> 
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
            <input type="text" class="form-control" id="contato" name="contato" placeholder="Email/Telefone/Celular"> 
        </div>
        <div class="form-group">
            <label for="title">Endereço</label>
            <input type="text" class="form-control" id="endereço" name="endereço" placeholder="Digite  a rua que está o pet"> 
        </div>
        <div class="form-group">
            <label for="title">Numero</label>
            <input type="text" class="form-control" id="number" name="number" placeholder="Numero da rua/casa/etc.."> 
        </div>
        <div class="form-group">
            <label for="title">Complemento</label>
            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Digite o complemento se necessario"> 
        </div>
        <div class="form-group">
            <label for="title">Ponto de referencia</label>
            <input type="text" class="form-control" id="refere" name="refere" placeholder="Digite um ponto de referencia"> 
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
                <option value="1">Gato</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Sexo do pet?</label>
            <select name="sex" id="sex" class="form-control">
                <option value="0">Macho</option>
                <option value="1">Femea</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Descrição</label>
            <textarea name="description" id="description"  class="form-control" placeholder="Nos informe algumas caracteristicas do pet, se está machucado entre outras."></textarea>
           
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
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Nenhuma">Nenhuma Lesão Aparente
            </div>
            
           
        </div>
        <input type="submit" class="btn btn-primary" value="Realizar ocorrencia">
    </form>
</div>

@endsection