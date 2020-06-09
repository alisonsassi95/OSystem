@extends('adminlte::page')

@section('title', 'Listas de Parceiros')

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
                                <th>CNPJ</th>
                                <th>Telefone</th>
                                <th>email</th>
                                <th>Mensagem</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                               
                        @foreach($Contacts as $Contacts)
                        
                        <tr>
                                <td>{{ $Contacts->name }}</td>
                                <td>{{ $Contacts->cnpj }}</td>
                                <td>{{ $Contacts->contact_phone }}</td>
                                <td>{{ $Contacts->email }}</td>
                                <td>{{ $Contacts->description }}</td>
                                <td>
                                    <a class="btn btn-default" href="{{route('Contact.edit',$Contact->id)}}"><i class="glyphicon glyphicon-edit"></i >Editar</a>
                                    <a class="btn btn-danger" href="{{route('Contact.delete',$Contact->id)}}' : false)"><i class="glyphicon glyphicon-trash"></i >Deletar</a>
                                </td>
                            <tr>
                        
                        @endforeach
                            
                        </tbody>

        </div>
    </div>
</div>
@stop

@section('js')
    
@endsection
