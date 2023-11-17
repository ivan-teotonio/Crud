@extends('layouts.app')

@section('title', 'Edição')


@section('content')



<div class="container mt-5"> 
    <div class="row mb-5">
        <div class="col-sm-10">
          <h1>Editar Frota</h1>
        </div>
        <div class="col-sm-2">
          <a href="{{ route('frota.index')}}" class="btn btn-info text-white">Voltar</a>
        </div>
      </div>
    <hr>
    <form action="{{route('frota.update',$frota->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input value="{{ $frota->modelo }}" type="text" class="form-control" name="modelo" placeholder="Digite um modelo...">
            </div>
            <br>
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input value="{{ $frota->marca }}" type="text" class="form-control" name="marca" placeholder="Digite a marca...">
            </div>
            <br>
            <div class="form-group">
                <label for="placa">Placa:</label>
                <input value="{{ $frota->placa }}" type="text" class="form-control" name="placa" placeholder="Digite a placa...">
            </div>
            <br>
            <div class="form-group">
                <label for="ano">Ano:</label>
                <input value="{{ $frota->ano }}" type="text" class="form-control" name="ano" placeholder="Digite o ano com quatro digitos...">
            </div>
            <br>
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <input value="{{ $frota->ativo }}" type="text" class="form-control" name="ativo" placeholder="Digite 1 para ativo e 0 para Inativo...">
            </div>

            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Atualizar" name="submit">
            </div>
        </div>
    </form>
</div>



@endsection