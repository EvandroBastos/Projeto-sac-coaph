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
<div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('clients.create') }}"><i class="fas fa-plus-circle"></i> &nbsp;Cadastrar</a>
        <a class="btn btn-danger" data-toggle="modal" href="{{ route('clients.chart') }}"><i class="fas fa-chart-line"></i> &nbsp;Gráfico</a>
    </div>
    </div>
    </div>
<br>

    <div class="row">
        <div class="col-md-12">
            <table id="gridProdutos" class="table table-hover table-striped table-condensed" hidden>
                <thead>
                    <tr>
                        <th>Protocolo Atendimento</th>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data Registro</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                    <tr>
                        <td>{{ $client->protocolo }}</td>
                        <td>{{ $client->matricula }}</td>
                <td><a href="{{ route('clients.show', $client->id)}}">{{ $client->nome }} </a></td>
                        <td>{{ $client->email }}</td>
                        <td>{{ @$client->created_at->format('d/m/Y H:i:s')}} </td>
                        <td>
                        <button class="btn btn-info btn-sm" data-id="{{$client->id }}" data-protocolo="{{$client->protocolo }}" data-digitro="{{$client->digitro }}" data-matricula="{{$client->matricula }}"
                                data-cpf="{{$client->cpf }}" data-nome="{{$client->nome }}" data-telefone="{{$client->telefone }}" data-email="{{$client->email }}"
                                data-setor="{{$client->setor }}" data-motivo="{{$client->motivo }}" data-assunto="{{$client->assunto }}" data-observacao="{{$client->observacao }}" data-documentacao="{{$client->documentacao}}"
                                data-toggle="modal" data-target="#visualizar"><i class="fas fa-chalkboard-teacher"></i></button>
                        <a class="btn btn-warning btn-sm" href="{{ route('clients.edit', $client->id) }}"><i class="far fa-edit"></i></a>
                        <a class="btn btn-secondary btn-sm" href="/file/download/{{$client->documento}}"><i class="fas fa-file-download"></i></a>
                        <button class="btn btn-danger btn-sm" data-id="{{$client->id }}" type="submit"  data-toggle="modal" data-target="#eliminar"><i class="far fa-trash-alt"></i></button>
                </td>
                    </tr>
                    @empty
                  <tr> <p>Nenhum cliente cadastrado</p> </tr>
                   @endforelse

                </tbody>
            </table>

        </div>
    </div>
<!-- Inicio do MODAL(GET) -->
<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Registro do Atendimento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Closer"><spam aria-hidden="true">
                    &times;</spam></button>
            </div>
            <form  action="{{ route('clients.show', $client->id) }}" method="post">
                {{ method_field('GET') }}
                {{ csrf_field() }}
            <div class="modal-body">

                @include('clients.visualizar')
            </div>
           <div class="modal-footer">
        <a type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-retweet"></i>Fechar</a>
    </div>
        </form>
        </div>
    </div>
</div>
<!-- Script do MODAL GET-->
<script>
$('#visualizar').on('show.bs.modal', function(event){
    var button =$(event.relatedTarget)
    var id = button.data('id')
    var protocolo = button.data('protocolo')
    var digitro = button.data('digitro')
    var matricula = button.data('matricula')
    var cpf = button.data('cpf')
    var nome = button.data('nome')
    var telefone = button.data('telefone')
    var email = button.data('email')
    var setor = button.data('setor')
    var motivo = button.data('motivo')
    var assunto = button.data('assunto')
    var observacao = button.data('observacao')
    var documentacao = button.data('documentacao')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #protocolo').val(protocolo);
    modal.find('.modal-body #digitro').val(digitro);
    modal.find('.modal-body #matricula').val(matricula);
    modal.find('.modal-body #cpf').val(cpf);
    modal.find('.modal-body #nome').val(nome);
    modal.find('.modal-body #telefone').val(telefone);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #setor').val(setor);
    modal.find('.modal-body #motivo').val(motivo);
    modal.find('.modal-body #assunto').val(assunto);
    modal.find('.modal-body #observacao').val(observacao);
    modal.find('.modal-body #documentacao').val(documentacao);
});
</script>
<!-- fim do MODAL(GET) -->
<!-- Inicio do MODAL destroy-->
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-warning" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="exampleModalLabel">Excluir o Registro do Atendimento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Closer"><spam aria-hidden="true">
                    &times;</spam></button>
            </div>
            <form  action="{{ route('clients.destroy', $client->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            <div class="modal-body">
                <p class="text-center">
                    Você tem certeza que deseja deletar o Protocolo?
                </p>
               <input type="hidden" name="id" id="id" value="">
            </div>

           <div class="modal-footer">
        <a type="submit" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-user-times"></i> &nbsp;Sim, Deletar</a>
        <a type="button" class="btn btn-outline-success" data-dismiss="modal"><i class="fas fa-user-md"></i> &nbsp;Não, Cancelar</a>

    </div>

        </form>
        </div>
    </div>
</div>
<!-- script do MODAL destroy-->
<script>
    $('#eliminar').on('show.bs.modal', function(event){
        var button =$(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
    });
    </script>
<!-- fim do MODAL destroy-->

<script type="text/javascript" charset="utf-8">
    var table = $(document).ready(function() {
        $('#gridProdutos').DataTable({
"paging": true,
"lengthMenu": [[5,10,15,20,25,30,40,50, -1], [5,10,15,20,25,30,40,50, "All"]],
"language": {
"sEmptyTable": "Nenhum registro encontrado",
"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
"sInfoFiltered": "(Filtrados de _MAX_ registros)",
"sInfoPostFix": "",
"sInfoThousands": ".",
"sLengthMenu": "_MENU_ resultados por página",
"sLoadingRecords": "Carregando...",
"sProcessing": "Processando...",
"sZeroRecords": "Nenhum registro encontrado",
"sSearch": "Pesquisar",
"oPaginate": {
"sNext": "Próximo",
"sPrevious": "Anterior",
"sFirst": "Primeiro",
"sLast": "Último"
},
"oAria": {
"sSortAscending": ": Ordenar colunas de forma ascendente",
"sSortDescending": ": Ordenar colunas de forma descendente"
},
"select": {
"rows": {
    "_": "Selecionado %d linhas",
    "0": "Nenhuma linha selecionada",
    "1": "Selecionado 1 linha"
}
},
"buttons": {
"copy": "Copiar para a área de transferência",
"copyTitle": "Cópia bem sucedida",
"copySuccess": {
    "1": "Uma linha copiada com sucesso",
    "_": "%d linhas copiadas com sucesso"
}
}
    }
});
    $('#gridProdutos').removeAttr('hidden');
    } );

</script>

@include('sweetalert::alert')

@endsection









