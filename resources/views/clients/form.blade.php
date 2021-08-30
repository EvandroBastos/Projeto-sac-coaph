<div class="form-row">
    <div class="col">
      <label for="matricula">Matrícula</label>
      <input type="text" class="form-control" id="matricula" name="matricula" value="{{ @$client->matricula }}" autofocus>
    </div>
    <div class="col">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" value="{{ @$client->cpf}}">
    </div>
    <div class="col-6">
      <label for="nome">Nome do Cooperado</label>
      <input type="text" class="form-control" id="nome" name="nome" value="{{ @$client->nome }}">
    </div>
  </div>

    <div class="form-row">
      <div class="col">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control cl-telefone" id="telefone" name="telefone"  value="{{ @$client->telefone }}">
      </div>
      <div class="col-5">
        <label for="email">Email</label>
        <input type="email" class="form-control " id="email" name="email" value="{{ @$client->email }}">
      </div>
      <div class="col-4">
        <label for="setor">Setor Responsável</label>
        <select class="form-control" id="setor" name="setor" value="{{ @$client->setor }}">
          <option>Selecione Área Responsável</option>
          <option value="APH" {{($client->setor  ==='APH') ? 'selected' : ''}}>APH</option>
          <option value="Atendimento" {{($client->setor  ==='Atendimento') ? 'selected' : ''}}>Atendimento</option>
          <option value="Comercial" {{($client->setor  ==='Comercial') ? 'selected' : ''}}>Comercial</option>
          <option value="Financeiro" {{($client->setor  ==='Financeiro') ? 'selected' : ''}}>Financeiro</option>
          <option value="Jurídico" {{($client->setor  ==='Jurídico') ? 'selected' : ''}}>Jurídico</option>
          <option value="Marketing" {{($client->setor  ==='Marketing') ? 'selected' : ''}}>Marketing</option>
          <option value="Previsão Producao" {{($client->setor  ==='Previsão Producao') ? 'selected' : ''}}>Previsão Produção</option>
          <option value="Hospital" {{($client->setor  ==='Hospital') ? 'selected' : ''}}>Hospital</option>
          </select>
      </div>
    </div>
    <div class="form-row">
      <div class="col">
      <label for="motivo">Motivo da Ligação</label>
      <select multiple class="form-control" id="motivo" name="motivo" value="{{ @$client->motivo }}">
        <option value="Atendimento Rápido" {{($client->motivo  ==='Atendimento Rápido') ? 'selected' : ''}}>Atendimento Rápido</option>
        <option value="Informação" {{($client->motivo  ==='Informação') ? 'selected' : ''}}>Informação</option>
        <option value="Reclamação" {{($client->motivo  ==='Reclamação') ? 'selected' : ''}}>Reclamação</option>
        <option value="Solicitação" {{($client->motivo  ==='Solicitação') ? 'selected' : ''}}>Solicitação</option>
        <option value="Sugestão" {{($client->motivo  ==='Sugestão') ? 'selected' : ''}}>Sugestão</option>
        <option value="Elogio" {{($client->motivo  ==='Elogio') ? 'selected' : ''}}>Elogio</option>
      </select>
    </div>
    <div class="col">
        <label for="assunto">Assunto da Ligação</label>
        <select multiple class="form-control" id="assunto" name="assunto" value="{{ @$client->assunto }}">
            <option value="Pagamento" {{($client->assunto  ==='Pagamento') ? 'selected' : ''}}>Pagamento</option>
            <option value="Cooperação" {{($client->assunto  ==='Cooperação') ? 'selected' : ''}}>Cooperação</option>
            <option value="Desfiliação" {{($client->assunto  ==='Desfiliação') ? 'selected' : ''}}>Desfiliação</option>
            <option value="Cadastro" {{($client->assunto  ==='Cadastro') ? 'selected' : ''}}>Cadastro</option>
            <option value="Vagas" {{($client->assunto  ==='Vagas') ? 'selected' : ''}}>Vagas</option>
            <option value="Ponto" {{($client->assunto  ==='Ponto') ? 'selected' : ''}}>Ponto</option>
            <option value="Plantões" {{($client->assunto  ==='Plantões') ? 'selected' : ''}}>Plantões</option>
            <option value="Biometria" {{($client->assunto  ==='Biometria') ? 'selected' : ''}}>Biometria</option>
            <option value="Recadastrar Digital" {{($client->assunto  ==='Recadastrar Digital') ? 'selected' : ''}}>Recadastrar Digital</option>
            <option value="Área Restrita do Cooperado" {{($client->assunto  ==='Área Restrita do Cooperado') ? 'selected' : ''}}>Área Restrita do Cooperado</option>
            <option value="Plano Benefício" {{($client->assunto  ==='Plano Benefício') ? 'selected' : ''}}>Plano Benefício</option>
            <option value="Demonstrativo de Produção" {{($client->assunto  ==='Demonstrativo de Produção') ? 'selected' : ''}}>Demonstrativo de Produção</option>
            <option value="INSS e IR" {{($client->assunto  ==='INSS e IR') ? 'selected' : ''}}>INSS e IR</option>
            <option value="Preposto" {{($client->assunto  ==='Preposto') ? 'selected' : ''}}>Preposto</option>
            <option value="Declaração" {{($client->assunto  ==='Declaração') ? 'selected' : ''}}>Declaração</option>
            <option value="Mal Atendimento" {{($client->assunto  ==='Mal Atendimento') ? 'selected' : ''}}>Mal Atendimento</option>
            <option value="Cursos" {{($client->assunto  ==='Cursos') ? 'selected' : ''}}>Cursos</option>
            <option value="Plano de Saúde" {{($client->assunto  ==='Plano de Saúde') ? 'selected' : ''}}>Plano de Saúde</option>
            <option value="Outros" {{($client->assunto  ==='Outros') ? 'selected' : ''}}>Outros</option>
        </select>
      </div>
     </div>
    <div class="form-group">
      <label for="observacao">Observação</label>
      <textarea class="form-control" id="observacao" name="observacao" rows="3" >{{ @$client->observacao }}</textarea>
    </div>
    <div class="form-row">
         <div class="col-4">
            <label for="protocolo">Protocolo do Atendimento</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="protocolo" name="protocolo" value="{{ @$client->protocolo }}" readonly>
          </div>
          <div class="col-4">
            <label for="digitro">Protocolo da Dígitro</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="digitro" name="digitro" value="{{ @$client->digitro }}">
          </div>
          <div class="col-4">
            <label for="digitro">Anexar Documento</label>
            <input type="file" class="form-control-file" id="documento" name="documento" value="{{ @$client->documento }}">
          </div>
    </div>
      <div class="col-right float-right">
      <button type="submit" class="btn btn-success"><i class="far fa-check-square"></i> &nbsp;Salvar</button>
      <a class="btn btn-info" href="{{ route('clients.index') }}"><i class="fas fa-list-ul"></i> &nbsp;Listar</a>
    </div>
    <script src="{{asset('jquery/jquery.mask.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00', {reverse: true});
            $('#telefone').mask('(99) 9 9999-9999');
        });
    </script>

