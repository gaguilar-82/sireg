@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-header">
          Número de Lotes por Tipo de Colonia
        </div>
        <div class="card-body">
            <canvas id="chart" width="300" height="300"></canvas>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-header">
          Número de Escrituras por Tipo de Colonia
        </div>
        <div class="card-body">
          <canvas id="chart" width="300" height="300"></canvas>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-header">
          Ingresos Totales por Concepto
        </div>
        <div class="card-body">
          <canvas id="chart" width="300" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- Confirmación registro eliminado --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('eliminar') == 'ok')
        <script type="text/javascript" src="{{ asset('js/eliminado.js') }}"></script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      var ctx = document.getElementById('chart');
      var invisur=@json($invisur);
      var crett=@json($crett);
      var barrios=@json($barrios);
      var donacion=@json($donacion);
      var veladero=@json($veladero);
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Patrimonio INVISUR', 'Patrimonio CRETT', 'Barrios Históricos', 'Donación Condicional', 'Parque Nacional El Veladero'],
            datasets: [{
                label: '# of Votes',
                data: [invisur, crett, barrios, donacion, veladero],
                backgroundColor: [
                    'rgba(51, 102, 255, 0.2)',
                    'rgba(0, 153, 255, 0.2)',
                    'rgba(255, 153, 51, 0.2)',
                    'rgba(153, 255, 51, 0.2)',
                    'rgba(102, 0, 255, 0.2)'
                ],
            }]
        },
        options: {
          responsive: false
        }
    });
</script>
@stop
