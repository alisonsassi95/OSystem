@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')


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
              <span class="info-box-number">12</span>
          </div>
      </div>
    </div> 
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Ordem de serviço Realizados</span>
              <span class="info-box-number">2</span>
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
                                <td>85.00</td>
                                <td>sim</td>
                                <td>
                                <a class="btn btn-default" href=""><i class="glyphicon glyphicon-edit"></i > Sim</a>
                                <a class="btn btn-default" href=""><i class="glyphicon glyphicon-edit"></i > Não</a>
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
            <span class="info-box-number">{{count($Clientes)}}<small></small></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
          <span class="info-box-icon bg-red"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">OS Pendentes</span>
            <span class="info-box-number">{{count($Clientes)}}<small></small></span>
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
                            <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($orderServices as $orderService)
                                <td>{{ $orderService->peoples }}</td>
                                <td>{{ $orderService->equipaments }}</td>
                                <td>{{ $orderService->problem }}</td>
                                <td>{{ $orderService->data_solicitacao }}</td>
                                <td>
                                    <a class="btn btn-default" href="{{route('orderService.edit',$orderService->id)}}"><i class="glyphicon glyphicon-edit"></i >Editar</a>
                                    <a class="btn btn-danger" href="{{route('orderService.delete',$orderService->id)}}' : false)"><i class="glyphicon glyphicon-trash"></i >Deletar</a>
                                </td>
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

