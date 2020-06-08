@extends('adminlte::page')

@section('title', 'Listas de Ordem de serviço')

@section('content')
<div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Consulta</h3>
        </div>

            <div class="panel-body">
                
            @include('sweet::alert')

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
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
                        
                        @foreach($People as $People)
                        <td>{{ $People->name }}</td>
                        @endforeach

                        @foreach($Equipament as $Equipament)
                        <td>{{ $Equipament->name }}</td>
                        @endforeach
                        
                        @foreach($orderServices as $orderService)
                                <td>{{ $orderService->problem }}</td>
                                <td>{{ $orderService->data_hora }}</td>
                                <td>
                                    <a class="btn btn-default" href="{{route('orderService.edit',$orderService->id)}}"><i class="glyphicon glyphicon-edit"></i >Editar</a>
                                    <a class="btn btn-danger" href="{{route('orderService.delete',$orderService->id)}}' : false)"><i class="glyphicon glyphicon-trash"></i >Deletar</a>
                                </td>
                               
                            <tr>
                        
                        @endforeach
                            
                        </tbody>

                    </table>
                    <div align="center">
                        {!! $orderServices->links() !!}
                    </div> 

                    
                    <a class="btn btn-primary" href="{{route('orderService.add')}}"><i class="glyphicon glyphicon-plus"></i > Adicionar</a>
                    

        </div>
    </div>
</div>
@stop

@section('js')
    
@endsection
