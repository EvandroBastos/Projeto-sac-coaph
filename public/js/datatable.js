<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>

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

    } );
</script>
