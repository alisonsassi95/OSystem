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
                            <th>Orçamento</th>
                            <th>Status</th>
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
                                <td>{{ $orderService->value }}</td>
                                <td data-toggle="tooltip" title="{{$orderService->statusDescricao}}" >{{ $orderService->status }}</td>
                                <td>
                                    <a class="btn btn-default" href="{{route('orderService.edit',$orderService->id)}}"><i class="glyphicon glyphicon-edit"></i >Editar</a>
                                    @cannot('user')                               
                                    <a class="btn btn-primay" type="button" data-toggle="modal" data-target="#myModalcad_{{$orderService->id}}"><i class="glyphicon glyphicon-eur"></i >Orçar</a>
                                    <a class="btn btn-danger" href="{{route('orderService.delete',$orderService->id)}}' : false)"><i class="glyphicon glyphicon-trash"></i >Deletar</a>
                                    @endcannot('user')

                                </td>
                            <tr>
                        @endforeach
                            
                        </tbody>
                </table>
                    
                    <a class="btn btn-primary" href="{{route('orderService.add')}}"><i class="glyphicon glyphicon-plus"></i > Adicionar</a>
                    

        </div>
    </div>
</div>

                            <!-- Inicio Modal -->
                            <div class="modal fade"  id="myModalcad_{{$orderService->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="myModalLabel">Orçamento</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action=" {{ route('orderService.estimate') }}" method="post">
                                                    {{ csrf_field() }}
                                                   
                                                    <div class="form-group">
                                                        <label for="name">Id Solicitaçao</label>
                                                        <input type="text" name="id_solicitacao" value="{{ $orderService->id }}"class="form-control">
                                                    </div>
                                                    <div class="form-group {{$errors->has('service') ? 'has-error' : '' }}">
                                                    <label for="name">Serviço</label>
                                                    <input type="text" name="service" class="form-control" placeholder="Serviço que que precisa ser realizado">
                                                    @if($errors->has('service'))
                                                    <span class="help-block">
                                                        <strong>{{$errors->first('service')}}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="value">Valor</label>
                                                    <input type="text" name="value" class="form-control" placeholder="valor do orçamento">
                                                    @if($errors->has('value'))
                                                    <span class="help-block">
                                                        <strong>{{$errors->first('value')}}</strong>
                                                    </span>
                                                    @endif
                                                    <input readOnly = "true" type="datetime" name="data_estimate" class="form-control" value="<?php echo date('Y-m-d h:m:s');?>">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name = 'StatusAll'>     
                                                        @foreach($StatusAll as $StatusAll)
                                                        <option required selected  id = 'StatusAll' value="{{ $StatusAll->id }}">{{ $StatusAll->name}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                <div class="form-group {{$errors->has('description') ? 'has-error' : '' }}">
                                                <label for="description">Descrição</label>
                                                    <textarea for="description" type="text" id="description" class="form-control rounded-0 {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>Descrição</textarea>

                                                        @if ($errors->has('description'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('description') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>                      
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Orçar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim Modal -->
@stop
