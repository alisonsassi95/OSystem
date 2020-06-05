@extends('adminlte::page')

@section('title', 'Cadastro de Usuários')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @include('sweet::alert')
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                
                <li class="active">Usuário</li>
                </ol>

                <div class="panel-body">
                    <p><a class="btn btn-info" href="{{route('User.load')}}">Adicionar</a></p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Ativo</th>
                                <th>Ação</th>
                                </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $x)
                        <tr>
                                <th scope="row">{{ $x->id }}</th>
                                <td>{{ $x->name }}</td>
                                <td>{{ $x->email }}</td>
                                <td>{{ $x->ativo }}</td>
                                <td>    
                                    <a class="btn btn-default" href="{{route('User.edit',$x->id)}}"><i class="glyphicon glyphicon-edit"></i > Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('User.delete',$x->id)}}' : false)"><i class="glyphicon glyphicon-trash"></i >   Deletar</a>
                                </td>
                            <tr>
                        @endforeach                           
                        </tbody>
                    </table>

                    <div align="center">
                        {!! $results->links() !!}
                    </div> 

                </div>
            </div>
        </div>
    </div>
</div>
@stop

