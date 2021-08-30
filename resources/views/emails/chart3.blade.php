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
.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
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
    <a class="btn btn-info" href="{{ route('emails.index') }}"><i class="fas fa-retweet"></i> &nbsp;Fechar</a>
             </div>
        </div>
</body>



<script type="text/javascript">
    var clients =  <?php echo json_encode($record) ?>;
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);

    Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Volume de Mensagem E-Mail'
    },
    subtitle: {
        text: 'Dimensionamento: SAC COAPH'
    },
    xAxis: {
        categories: cData.data
    },
    yAxis: {
        title: {
            text: 'Quantidade de e-mail'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Recebidos',
        data: cData.qtd1
    }, {
        name: 'Enviados',
        data: cData.qtd2
    }]
});
</script>


</html>
@endsection
