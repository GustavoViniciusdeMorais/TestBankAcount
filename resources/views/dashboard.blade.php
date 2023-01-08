@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ $account->name }}</h1>
@stop

@section('content')
{{-- {{dd($transactions)}} --}}
    <div class="card">
        <div class="card-header">
            Account: {{ $account->account->uuid }}
        </div>
        <div class="card-body">
            <div class="col-6">
                @if(isset($transactions))
                  <div class="card">
                    <div class="card-header">
                      <strong>Gráfico de Transações</strong>
                    </div>
                    <div class="card-body">
                      <div id="transactions_chart" style="width: 800; height: 600;"></div>
                    </div>
                    <div class="card-footer"></div>
                  </div>
                  <br>
                @endif
              </div>
        </div>
        <div class="card-footer"></div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    @if(isset($transactions['result']))

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawLineChart() {
          var data = google.visualization.arrayToDataTable({{ Js::from($transactions['result']) }});
          var options = {
            title: '',
            curveType: 'function',
            legend: { position: 'bottom' },
            responsive: true,
            vAxis: {format: '0'},
            hAxis: {format: '0'}
          };
          var chart = new google.visualization.LineChart(document.getElementById('transactions_chart'));
          chart.draw(data, options);
        }

        function drawChart() {
            drawLineChart();
        }
    </script>

    @endif

@stop
