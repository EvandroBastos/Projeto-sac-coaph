@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
    <style>
        html, body {
            background-color:#F8F8FF;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .highcharts-figure, .highcharts-data-table table {
    min-width: 360px;
    max-width: 800px;
    margin: 1em auto;
}



    </style>
<head>
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

</head>

<body>

    <div class="container">
            <div id="container"></div>
            <br>
            <div class="col-right float-right">
    <a class="btn btn-info" href="{{ route('clients.index') }}"><i class="fas fa-retweet"></i> &nbsp;Fechar</a>
             </div>
     <div class="row">
        <div class="col-md-12">

            <ul class="chart">
                @foreach($ssss as $row)
                  <li data-data="{{$row->contar}}">{{$row->setor}}</li>
                @endforeach
            </ul>
        </div>


    </div>
    </div>
</body>




<script type="text/javascript">
    var clients =  <?php echo json_encode($clients) ?>;
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);

    Highcharts.chart('container', {
        title: {
            text: 'Volume de Atendimento Telefônico'
        },
        subtitle: {
            text: 'Protocolo: SAC COAPH'
        },
         xAxis: {
            categories: cData.label
        },
        yAxis: {
            title: {
                text: 'Número de Registros'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Atendimento',
            data: cData.data
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
</script>

<script>
        $(function () {
           $("ul.chart").hBarChart();
        })
        $("ul.chart").hBarChart({
        bgColor: '#C000',
        textColor: '#fff',
        show: 'data',
        sorting: true,
        maxStyle: {
            bg: 'orange',
            text: 'white'
        }
});
    </script>
</html>
@endsection
