@extends('adminlte::page')

@section('title', 'Listas de Equipamentos')

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
                                <th>Nome</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Serial</th>
                                <th>Ativo</th>
                                <th>Descrição</th>
                                
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                               
                        @foreach($equipaments as $equipament)
                        
                        <tr>
                                <td>{{ $equipament->name }}</td>
                                <td>{{ $equipament->mark }}</td>
                                <td>{{ $equipament->model }}</td>
                                <td>{{ $equipament->serialnumber }}</td>
                                <td> 
                                    @if($equipament->active  == 1)
                                        Ativo
                                    @else
                                        Inativo
                                    @endif
                                </td>
                                
                                <td>{{ $equipament->description }}</td>
                                
                                <td>
                                    <a class="btn btn-default" href="{{route('equipament.edit',$equipament->id)}}"><i class="glyphicon glyphicon-edit"></i >Editar</a>
                                    <a class="btn btn-danger" href="{{route('equipament.delete',$equipament->id)}}' : false)"><i class="glyphicon glyphicon-trash"></i >Deletar</a>
                                </td>
                            <tr>
                        
                        @endforeach
                            
                        </tbody>

                    </table>
                    <div align="center">
                        {!! $equipaments->links() !!}
                    </div> 

                    
                    <a class="btn btn-primary" href="{{route('equipament.add')}}"><i class="glyphicon glyphicon-plus"></i > Adicionar</a>
                    

        </div>
    </div>
</div>
@stop

@section('js')
    
@endsection
