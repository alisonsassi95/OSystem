@extends('adminlte::page')

@section('title', 'Cadastro de order Service')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de order Service</h3>
 </div>
 <div role="form">
        <div class="box-body">
            @include('sweet::alert')

                    <form action="{{ route('orderService.save') }}" method="post">
                    {{ csrf_field() }}
                        
                    <div class="form-group">
                        <input  readOnly = "true" type="text" name="peoples_id" value="{{ $teste->name }}" class="form-control">
                    </div>
                        <div class="form-group {{$errors->has('problem') ? 'has-error' : '' }}">
                            <label for="problem">Problema</label>
                            <input type="text" name="problem" class="form-control" placeholder="Problema da orderServiceo">
                        @if($errors->has('problem'))
                        <span class="help-block">
                            <strong>{{$errors->first('problem')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class=" form-group col-md-3" value="{{ old('data_hora') }}">
                            <label for="data_hora">Data de solicitação</label>
                            <input type="date" name="data_hora" class="form-control" placeholder="Data Atual">
                        </div>

                        <div class=" form-group col-md-3" value="{{ old('data_hora_entrega') }}">
                            <label for="data_hora_entrega">Data de Entrega</label>
                            <input type="date" name="data_hora_entrega" class="form-control" placeholder="Data de entrega">
                        </div>

                        <div class="form-group">
                            <label>Equipamento</label>
                            <select class="form-control"  name="equipaments_id" id="equipaments_id">
                                <option value="">Selecione um Equipamento</option>       
                                @foreach($equipaments as $equipaments)
                                <option required value="{{ $equipaments->id }}">{{ $equipaments->name }} - Modelo - {{ $equipaments->model }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Criar ordem de serviço</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


                                         <!-- Inicio Modal -->
                                    <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Tipos de Exame</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action=" {{ route('examtype.save') }}" method="post">
                                                    {{ csrf_field() }}
                                                    
                                                    <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                                                        <label for="recipient-name" class="control-label">Nome:</label>
                                                        <input name="name" type="text" class="form-control">
                                                        @if($errors->has('name'))
                                                            <span class="help-block">
                                                            <strong>{{$errors->first('name')}}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Detalhes:</label>
                                                        <textarea name="description" class="form-control"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Cadastrar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim Modal -->

@stop



