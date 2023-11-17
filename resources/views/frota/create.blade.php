@extends('layouts.app')

@section('title', 'Criação')


@section('content')



<div class="container mt-5"> 

    <div class="row mb-5">
        <div class="col-sm-10">
          <h1>Criar nova Frota</h1>

          @if($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach($errors->all() as $error)
                  <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
         @endif

        </div>
        <div class="col-sm-2">
          <a href="{{ route('frota.index')}}" class="btn btn-info text-white">Voltar</a>
        </div>
      </div>

    <hr>
    <form action="{{route('frota.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo" placeholder="Digite um modelo...">
            </div>
            <br>
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" placeholder="Digite a marca...">
            </div>
            <br>
            <div class="form-group">
                <label for="placa">Placa:</label>
                <input type="text" class="form-control" name="placa" placeholder="Digite a placa...">
            </div>
            <br>
            <div class="form-group">
                <label for="ano">Ano:</label>
                <input type="text" class="form-control" name="ano" placeholder="Digite o ano com quatro digitos...">
            </div>
            <br>
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <input type="text" class="form-control" name="ativo" placeholder="Digite 1 para ativo e 0 para Inativo...">
            </div>

            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar" name="submit">
            </div>
        </div>
    </form>
</div>



@endsection