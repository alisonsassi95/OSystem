@extends('adminlte::page')

@section('title', 'Cadastro de Pessoas')

@section('content')

<div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Consulta</h3>
           @include('sweet::alert')
        </div>

                <div class="panel-body">
                
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                  
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Endereço</th>
                                    <th>Ação</th>
                                  
                                </tr>
                              </thead>
                          <tbody>
                              
                              @foreach($peoples as $people)
                              <tr>
                                <td>{{ $people->name }}</td>
                                <td>{{ $people->email }}</td>
                                <td>{{ $people->address }}</td>
                                <td>

                                    <!--<a class="btn btn-default" href="{{route('people.detail',$people->id)}}">Detalhe</a>-->
                                    <a class="btn btn-default" href="{{route('people.edit',$people->id)}}"> <i class="glyphicon glyphicon-edit"></i > Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('people.delete',$people->id)}}' : false)"><i class="glyphicon glyphicon-trash"></i > Deletar</a>
                                    <a class="btn btn-primary" href="{{route('User.load',$people->id)}}"><i class="glyphicon glyphicon-user"></i > Criar Usuario</a>
                                        
                                </td>
                              </tr>
                            @endforeach
                    </table>

                    <div align="center">
                        {!! $peoples->links() !!}
                    </div> 
                    <a class="btn btn-primary" href="{{route('people.add')}}"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>
                </div>
            </div>
</div>

@stop

