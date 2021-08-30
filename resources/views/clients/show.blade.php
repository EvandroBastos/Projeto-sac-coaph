@extends('layouts.app')


@section('content')

<style>
    html, body {
        background-color:#F8F8FF;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
</style>
<div class="form-row">

    <div class="col">
      <label for="protocolo">Númedo do Protocolo</label>
      <input type="text" class="form-control" id="protocolo" name="protocolo" value="{{ @$client->protocolo }}"disabled>
    </div>
    <div class="col">
        <label for="digitro">Protocolo da Dígitro</label>
        <input type="text" class="form-control" id="digitro" name="digitro" value="{{ @$client->digitro }}"disabled>
      </div>
    <div class="col">
      <label for="matricula">Matrícula do Cooperado</label>
      <input type="text" class="form-control" id="matricula" name="matricula" value="{{ @$client->matricula }}"disabled>
    </div>
  </div>

<div class="form-row">
    <div class="col">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" value="{{ @$client->cpf }}"disabled>
    </div>
    <div class="col-8">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" value="{{ @$client->nome }}"disabled>
    </div>
  </div>
     <div class="form-row">
      <div class="col">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone" value="{{ @$client->telefone }}"disabled>
      </div>
      <div class="col-8">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ @$client->email }}"disabled>
      </div>
     </div>

    <div class="form-row">
        <div class="col">
            <label for="setor">Setor Responsável</label>
            <input type="setor" class="form-control" id="setor" name="setor" value="{{ @$client->setor }}"disabled>
          </div>
        <div class="col">
            <label for="motivo">Motivo</label>
            <input type="text" class="form-control" id="motivo" name="motivo" value="{{ @$client->motivo }}"disabled>
          </div>

          <div class="col">
            <label for="Assunto">Assunto</label>
            <input type="text" class="form-control" id="assunto" name="assunto" value="{{ @$client->assunto }}"disabled>
          </div>
     </div>
    <div class="form-group">
      <label for="observacao">Observação</label>
      <textarea class="form-control" id="observacao" name="observacao" rows="3" disabled>{{ @$client->observacao }}</textarea>
    </div>

    <div class="form-row">
        <div class="col-3">
          <label for="created_at">Criação do Registro</label>
          <input type="text" class="form-control" id="created_at" name="created_at" value="{{ @$client->created_at->format('d/m/Y H:i:s')}}"disabled>
        </div>
        <div class="col-3">
          <label for="updated_at">Alteração do Registro</label>
          <input type="updated_at" class="form-control" id="updated_at" name="updated_at" value="{{ @$client->updated_at->format('d/m/Y H:i:s')}}"disabled>
        </div>


       </div>
       <div class="col-right float-right">
        <button type="submit" class="btn btn-success"><i class="far fa-check-square"></i> &nbsp;Salvar</button>
        <a class="btn btn-info" href="{{ route('clients.index') }}"><i class="fas fa-list-ul"></i> &nbsp;Listar</a>
      </div>





@endsection
