<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <ol class="breadcrumb panel-heading">
            <li><a href="{{ route('people.index') }}">People</a></li>
            <li class="active">Detalhe</li>
            </ol>

                <div class="panel-body">
                <p>
                <b>people: </b>{{$people->name}}
                </p>
                <p>
                <b>E-Mail: </b>{{$people->email}}
                </p>
                <p>
                <b>Endereco: </b>{{$people->address}}
                </p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Numero</th>
                                <th>Acao</th>
                                </tr>
                        </thead>
                        <tbody>
                       @foreach($people ->telefones as $telefone)
                        <tr>
                                <th scope="row">{{ $people->id }}</th>
                                <td>{{ $telefone->titulo }}</td>
                                <td>{{ $telefone->telefone }}</td>
                                <td>
                                    <a class="btn btn-default" href="{{ route('telefone.edit',$telefone->id)}}"><i class="glyphicon glyphicon-edit"></i > Editar</a>
                                    <a class="btn btn-danger" href="{{ route('telefone.delete',$telefone->id)}}"><i class="glyphicon glyphicon-trash"></i > Deletar</a>
                                </td>
                            <tr>
                            @endforeach
                            
                        </tbody>

                    </table>

                    <p>
                <a class="btn btn-info" href="{{route('telefone.add', $people->id)}}">Adicionar Telefone</a>
                </p>

                </div>
            </div>
        </div>
    </div>
</div>