
<div class="form-row">
    <div class="col">
      <label for="protocolo">Protocolo do Atendimento</label>
      <input type="text" class="form-control" id="protocolo" name="protocolo" value="{{ @$presencial->protocolo }}"disabled>
    </div>
    <div class="col">
        <label for="digitro">Protocolo da Dígitro</label>
        <input type="text" class="form-control" id="digitro" name="digitro" value="{{ @$presencial->digitro }}"disabled>
      </div>
    <div class="col">
      <label for="matricula">Matrícula</label>
      <input type="text" class="form-control" id="matricula" name="matricula" value="{{ @$presencial->matricula }}"disabled>
    </div>
  </div>

<div class="form-row">
    <div class="col">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" value="{{ @$presencial->cpf }}"disabled>
    </div>
    <div class="col-8">
      <label for="nome">Nome do Cooperado</label>
      <input type="text" class="form-control" id="nome" name="nome" value="{{ @$presencial->nome }}"disabled>
    </div>
  </div>
     <div class="form-row">
      <div class="col">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone" value="{{ @$presencial->telefone }}"disabled>
      </div>
      <div class="col-8">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ @$presencial->email }}"disabled>
      </div>
     </div>

    <div class="form-row">
        <div class="col">
            <label for="setor">Setor Responsável</label>
            <input type="setor" class="form-control" id="setor" name="setor" value="{{ @$presencial->setor }}"disabled>
          </div>
        <div class="col">
            <label for="motivo">Motivo</label>
            <input type="text" class="form-control" id="motivo" name="motivo" value="{{ @$presencial->motivo }}"disabled>
          </div>

          <div class="col">
            <label for="Assunto">Assunto</label>
            <input type="text" class="form-control" id="assunto" name="assunto" value="{{ @$presencial->assunto }}"disabled>
          </div>
     </div>
    <div class="form-group">
      <label for="observacao">Observação</label>
      <textarea class="form-control" id="observacao" name="observacao" rows="3" disabled>{{ @$presencial->observacao }}</textarea>
    </div>


