<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coaph-Atendimento Gráficos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body class="bg-secondary">


    <div class="card-body">
        <div class="row">
            <div class="col-md-9">

            </div>
            <div class="col-md-3">
                <select name="mes" id="mes" class="form-control">
                    <option value="">Selecione o Mês</option>
                    @foreach($year_list as $row)
                        <option value="{{$row->mes}}">{{$row->mes}}</option>
                    @endforeach
                    {{-- <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option> --}}
                </select>
            </div>
        </div>
        <div style="margin-top: 15px;"></div>
        <div class="panel-body">
                <div id="chart_div" style="width: 100%; height: 600px;"></div>
        </div>

    </div>


    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages': ['corechart', 'bar']  });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawMonthlyChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawMonthlyChart(chart_data, chart_main_title) {
            let jsonData = chart_data;
            // Create the data table.
            let data = new google.visualization.DataTable();
            data.addColumn('string', 'registro');
            data.addColumn('number', 'protocolo');

            $.each(jsonData, (i, jsonData) => {

                let registro = jsonData.registro;
                let protocolo = parseFloat($.trim(jsonData.protocolo));
                data.addRows([
                    [registro, protocolo]

                ]);

            });

            data.addRows([
                // ['Mushrooms', 140],
                // ['Onions', 50],
                // ['Olives', 30],
                // ['Zucchini', 20],
                // ['Pepperoni', 12]


            ]);

            // Set chart options
            var options = {
                // 'title': 'Check Monthly Profit',
                title: chart_main_title,
                hAxis: {
                    title: "Registro"
                },
                vAxis: {
                    title: "Protocolo de Atendimento"
                },
                colors: ['black'],

            chartArea: {
                width: '50%',
                height: '60%'
                       }
            }
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }


        function load_monthly_data(mes, title) {
            const temp_title = title + ' ' + mes;
            $.ajax({
                url: 'chart/fetch_data',
                method:"POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    mes:mes
                },
                dataType: "JSON",
                success:function(data) {
                    drawMonthlyChart(data, temp_title);
                }
            });
            console.log(`Mes: ${mes}`);
        }

    </script>

    <script>

        $(document).ready(function() {
            $('#mes').change(function() {
                var mes = $(this).val();
                if(mes != '') {

                    load_monthly_data(mes, 'Monthlly Data for:');
                }
            });
        });
    </script>
</body>
</html>
