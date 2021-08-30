<div class="form-row">
    <div class="col">
      <label for="matricula">Matrícula</label>
      <input type="text" class="form-control" id="matricula" name="matricula" value="{{ @$presencial->matricula }}" autofocus>
    </div>
    <div class="col">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" value="{{ @$presencial->cpf}}">
    </div>
    <div class="col-6">
      <label for="nome">Nome do Cooperado</label>
      <input type="text" class="form-control" id="nome" name="nome" value="{{ @$presencial->nome }}">
    </div>
  </div>

    <div class="form-row">
      <div class="col">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control cl-telefone" id="telefone" name="telefone"  value="{{ @$presencial->telefone }}">
      </div>
      <div class="col-5">
        <label for="email">Email</label>
        <input type="email" class="form-control " id="email" name="email" value="{{ @$presencial->email }}">
      </div>
      <div class="col-4">
        <label for="setor">Setor Responsável</label>
        <select class="form-control" id="setor" name="setor" value="{{ @$presencial->setor }}">
          <option>Selecione Área Responsável</option>
          <option value="APH" {{($presencial->setor  ==='APH') ? 'selected' : ''}}>APH</option>
          <option value="Atendimento" {{($presencial->setor  ==='Atendimento') ? 'selected' : ''}}>Atendimento</option>
          <option value="Comercial" {{($presencial->setor  ==='Comercial') ? 'selected' : ''}}>Comercial</option>
          <option value="Financeiro" {{($presencial->setor  ==='Financeiro') ? 'selected' : ''}}>Financeiro</option>
          <option value="Jurídico" {{($presencial->setor  ==='Jurídico') ? 'selected' : ''}}>Jurídico</option>
          <option value="Marketing" {{($presencial->setor  ==='Marketing') ? 'selected' : ''}}>Marketing</option>
          <option value="Previsão Producao" {{($presencial->setor  ==='Previsão Producao') ? 'selected' : ''}}>Previsão Produção</option>
          <option value="Hospital" {{($presencial->setor  ==='Hospital') ? 'selected' : ''}}>Hospital</option>
          </select>
      </div>
    </div>
    <div class="form-row">
      <div class="col">
      <label for="motivo">Motivo da Ligação</label>
      <select multiple class="form-control" id="motivo" name="motivo" value="{{ @$presencial->motivo }}">
        <option value="Atendimento Rápido" {{($presencial->motivo  ==='Atendimento Rápido') ? 'selected' : ''}}>Atendimento Rápido</option>
        <option value="Informação" {{($presencial->motivo  ==='Informação') ? 'selected' : ''}}>Informação</option>
        <option value="Reclamação" {{($presencial->motivo  ==='Reclamação') ? 'selected' : ''}}>Reclamação</option>
        <option value="Solicitação" {{($presencial->motivo  ==='Solicitação') ? 'selected' : ''}}>Solicitação</option>
        <option value="Sugestão" {{($presencial->motivo  ==='Sugestão') ? 'selected' : ''}}>Sugestão</option>
        <option value="Elogio" {{($presencial->motivo  ==='Elogio') ? 'selected' : ''}}>Elogio</option>
      </select>
    </div>
    <div class="col">
        <label for="assunto">Assunto da Ligação</label>
        <select multiple class="form-control" id="assunto" name="assunto" value="{{ @$presencial->assunto }}">
            <option value="Pagamento" {{($presencial->assunto  ==='Pagamento') ? 'selected' : ''}}>Pagamento</option>
            <option value="Cooperação" {{($presencial->assunto  ==='Cooperação') ? 'selected' : ''}}>Cooperação</option>
            <option value="Desfiliação" {{($presencial->assunto  ==='Desfiliação') ? 'selected' : ''}}>Desfiliação</option>
            <option value="Pagamento" {{($presencial->assunto  ==='Pagamento') ? 'selected' : ''}}>Pagamento</option>
            <option value="Cadastro" {{($presencial->assunto  ==='Cadastro') ? 'selected' : ''}}>Cadastro</option>
            <option value="Vagas" {{($presencial->assunto  ==='Vagas') ? 'selected' : ''}}>Vagas</option>
            <option value="Ponto" {{($presencial->assunto  ==='Ponto') ? 'selected' : ''}}>Ponto</option>
            <option value="Plantões" {{($presencial->assunto  ==='Plantões') ? 'selected' : ''}}>Plantões</option>
            <option value="Biometria" {{($presencial->assunto  ==='Biometria') ? 'selected' : ''}}>Biometria</option>
            <option value="Recadastrar Digital" {{($presencial->assunto  ==='Recadastrar Digital') ? 'selected' : ''}}>Recadastrar Digital</option>
            <option value="Área Restrita do Cooperado" {{($presencial->assunto  ==='Área Restrita do Cooperado') ? 'selected' : ''}}>Área Restrita do Cooperado</option>
            <option value="Plano Benefício" {{($presencial->assunto  ==='Plano Benefício') ? 'selected' : ''}}>Plano Benefício</option>
            <option value="Demonstrativo de Produção" {{($presencial->assunto  ==='Demonstrativo de Produção') ? 'selected' : ''}}>Demonstrativo de Produção</option>
            <option value="INSS e IR" {{($presencial->assunto  ==='INSS e IR') ? 'selected' : ''}}>INSS e IR</option>
            <option value="Preposto" {{($presencial->assunto  ==='Preposto') ? 'selected' : ''}}>Preposto</option>
            <option value="Declaração" {{($presencial->assunto  ==='Declaração') ? 'selected' : ''}}>Declaração</option>
            <option value="Mal Atendimento" {{($presencial->assunto  ==='Mal Atendimento') ? 'selected' : ''}}>Mal Atendimento</option>
            <option value="Cursos" {{($presencial->assunto  ==='Cursos') ? 'selected' : ''}}>Cursos</option>
            <option value="Plano de Saúde" {{($presencial->assunto  ==='Plano de Saúde') ? 'selected' : ''}}>Plano de Saúde</option>
            <option value="Outros" {{($presencial->assunto  ==='Outros') ? 'selected' : ''}}>Outros</option>
        </select>
      </div>
     </div>
    <div class="form-group">
      <label for="observacao">Observação</label>
      <textarea class="form-control" id="observacao" name="observacao" rows="3" >{{ @$presencial->observacao }}</textarea>
    </div>
    <div class="form-row">
         <div class="col-4">
            <label for="protocolo">Protocolo do Atendimento</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="protocolo" name="protocolo" value="{{ @$presencial->protocolo }}" readonly>
          </div>
          <div class="col-4">
            <label for="digitro">Protocolo da Dígitro</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="digitro" name="digitro" value="{{ @$presencial->digitro }}">
          </div>
          <div class="col-4">
            <label for="digitro">Anexar Documento</label>
            <input type="file" class="form-control-file" id="documento" name="documento" value="{{ @$presencial->documento }}">
          </div>
    </div>
      <div class="col-right float-right">
      <button type="submit" class="btn btn-success"><i class="far fa-check-square"></i> &nbsp;Salvar</button>
      <a class="btn btn-info" href="{{ route('presencials.index') }}"><i class="fas fa-list-ul"></i> &nbsp;Listar</a>
    </div>
    <script src="{{asset('jquery/jquery.mask.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00', {reverse: true});
            $('#telefone').mask('(99) 9 9999-9999');
        });
    </script>

