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
        <button class="btn btn-primary" data-toggle="modal" data-target="#atendimento-whatsapp"><i class="fas fa-plus-circle"></i> &nbsp;Cadastrar</button>
        <a class="btn btn-danger" data-toggle="modal" href="{{ route('whatsapps.chart2') }}"><i class="fas fa-chart-line"></i> &nbsp;Gráfico</a>
    </div>

    </div>
    </div>
<br>
    <div class="row">
        <div class="col-md-12">
            <table id="gridWhatsapp" class="table table-hover table-striped table-condensed" hidden>
                <thead>
                    <tr>
                        <th>Data do Atendimento</th>
                        <th>Whatsapp Recebidos</th>
                        <th>Whatsapp Enviados</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($whatsapps as $whatsapp)
                    <tr>
                        <td>{{ $whatsapp->created_at->format('d/m/Y')}} </td>
                        <td>{{ $whatsapp->recebidos }}</td>
                        <td>{{ $whatsapp->enviados }}</td>
                        <td>
                        <button class="btn btn-info btn-sm" data-id="{{$whatsapp->id }}" data-recebido="{{$whatsapp->recebidos }}"
                        data-toggle="modal" data-target="#visualizar"><i class="fas fa-chalkboard-teacher"></i></button>
                        <a class="btn btn-warning btn-sm" href="{{ route('whatsapps.edit', $whatsapp->id) }}"><i class="far fa-edit"></i></a>

                        <button class="btn btn-danger btn-sm" data-id="{{$whatsapp->id }}" type="submit"  data-toggle="modal" data-target="#eliminar"><i class="far fa-trash-alt"></i></button>
                </td>
                    </tr>
                    @empty
                  <tr> <p>Nenhum registro de atendimento cadastrado</p> </tr>
                   @endforelse

                </tbody>
            </table>

        </div>
    </div>
<!-- Inicio do MODAL(GET) -->
<div class="modal fade" id="atendimento-whatsapp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Atendimento Whatsapp</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('whatsapps.store') }}">
              {{ csrf_field() }}
              {{ method_field('post') }}

            <div class="modal-body">
                <div class="form-group">
                    <label for="nome">Número de Atendimento Recebidos</label>
                    <input type="text" autofocus class="form-control" id="recebidos" name="recebidos">
                    <label for="nome">Número de Atendimento Enviados</label>
                    <input type="text" autofocus class="form-control" id="enviados" name="enviados">
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
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
    var recebidos = button.data('recebidos')
    var enviados = button.data('enviados')

    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #recebidos').val(recebidos);
    modal.find('.modal-body #enviados').val(enviados);
    });

});
</script>
<!-- fim do MODAL(GET) -->
<!-- Inicio do MODAL destroy-->

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
        $('#gridWhatsapp').DataTable({
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
    $('#gridWhatsapp').removeAttr('hidden');
    } );

</script>

@include('sweetalert::alert')

@endsection









