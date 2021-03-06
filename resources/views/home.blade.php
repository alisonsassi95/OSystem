@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
@include('sweet::alert')

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div>

    <!-- Main content -->
    <section class="content">
    @cannot('adm')
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Ordem de serviço Solicitados</span>
              <span class="info-box-number">{{count($orderServicesrequested)}}</span>
          </div>
      </div>
    </div> 
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Ordem de serviço Realizados</span>
              <span class="info-box-number">{{count($orderServicesrealized)}}</span>
            </div>
        </div>
    </div>        
          <h3>Minhas Solicitaçoes</h3>
          <table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="listEquip">
                        <thead>
                            <tr>
                            <th>Data Solicitação</th>
                            <th>Equipamento</th>
                            <th>Problema</th>
                            <th>Orçamento</th>
                            <th>Status</th>
                            <th>Aprovar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($orderServices as $orderService)
                                <td>{{ $orderService->data_solicitacao }}</td>
                                <td>{{ $orderService->equipaments }}</td>
                                <td>{{ $orderService->problem }}</td>
                                <td data-toggle="tooltip" title="{{$orderService->service}}" >{{ $orderService->value }}</td>
                                <td data-toggle="tooltip" title="{{$orderService->statusDescricao}}" >{{ $orderService->status }}</td>
                                <td>
                                <a class="btn btn-default" href="javascript:(confirm('Tem certeza que deseja Aprovar esse Serviço?') ? window.location.href='{{route('orderService.aprovar',$orderService->id)}}' : false)"><i class="glyphicon glyphicon-edit"></i > Sim</a>
                                <a class="btn btn-default" href="javascript:(confirm('Tem certeza que NÃO irá realizar o serviço?') ? window.location.href='{{route('orderService.negar',$orderService->id)}}' : false)"></i class="glyphicon glyphicon-edit" > Não</a>
                                </td>    
                            <tr>
                        @endforeach
                            
                        </tbody>
                    </table>
      @endcannot('adm')
      @cannot('user')
        
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Usuários</span>
            <span class="info-box-number">{{count($Usuarios)}}<small></small></span>
            </div>
          </div>
        </div>

        <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Clientes</span>
            <span class="info-box-number">{{count($Clientes)}}<small></small></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">OS em Aberto</span>
            <span class="info-box-number">{{count($orderServicesrequested)}}<small></small></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
          <span class="info-box-icon bg-red"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">OS Concluidas</span>
            <span class="info-box-number">{{count($orderServicesrealized)}}<small></small></span>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-sm-6 col-xs-12">
          <h3>Ordem de Serviços</h3>
          <table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="listEquip">
                        <thead>
                            <tr>
                            <th>Nome do Cliente</th>
                            <th>Equipamento</th>
                            <th>Problema</th>
                            <th>Data Solicitação</th>
                            </tr>
                        </thead>
              <tbody>
                        <tr>
                        @foreach($orderServices as $orderServices)
                                <td>{{ $orderServices->peoples }}</td>
                                <td>{{ $orderServices->equipaments }}</td>
                                <td>{{ $orderServices->problem }}</td>
                                <td>{{ $orderServices->data_solicitacao }}</td>   
                            <tr>
                        @endforeach
                            
            </tbody>
          </table>
        </div>    
    @endcannot('user')
    
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  
</body>

@stop

