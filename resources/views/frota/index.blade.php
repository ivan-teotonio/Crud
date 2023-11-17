@extends('layouts.app')

@section('title', 'Listagem')

@section('content')

<div class="container mt-5">

  <div class="row mb-5">
    <div class="col-sm-10">
      <h1>Listagem de Frota</h1>

      @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
      @endif

    </div>
    <div class="col-sm-2">
      <a href="{{ route('frota.create')}}" class="btn btn-success">Criar Frota</a>
    </div>
  </div>
  <table class="table">
      <thead>
        <tr>
          <th scope="col">Modelo</th>
          <th scope="col">Marca</th>
          <th scope="col">Placa</th>
          <th scope="col">Ano</th>
          <th scope="col">Ativo</th>
          <th scope="col">Acões</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($frotas as $frota)
        <tr>
          <th>{{ $frota->modelo }}</th>
          <td>{{ $frota->marca }}</td>
          <td>{{ $frota->placa }}</td>
          <td>{{ $frota->ano }}</td>
          <td>{{ $frota->ativo }}</td>
          <td class="d-flex">
            <a href="{{route('frota.edit',$frota->id)}}" class="btn btn-primary me-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
              </svg>
            </a>
            
            <form action="{{ route('frota.destroy',$frota->id) }}" method="post">
              @csrf
              @method('DELETE')
              <input type="hidden" name="id" value="{{ $frota->id }}">
              <button type="submit" class="btn btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                </svg>
              </button>
            </form>

          </td>
        </tr> 
      @endforeach
      </tbody>
    </table>

</div>

@endsection










