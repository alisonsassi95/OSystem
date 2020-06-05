@extends('adminlte::page')

@section('title', 'Cadastro de Ordem de serviço')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Ordem de serviço</h3>
 </div>
 <div role="form">
        <div class="box-body">
            @include('sweet::alert')

                    <form action="{{ route('equipament.save') }}" method="post">
                    {{ csrf_field() }}
                        
                        <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome do Equipamento">
                        @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group">
                            <label for="model">Modelo</label>
                            <input type="text" name="model" class="form-control" placeholder="Modelo do Equipamento">
                        @if($errors->has('model'))
                        <span class="help-block">
                            <strong>{{$errors->first('model')}}</strong>
                        </span>
                        @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="mark">Marca</label>
                            <input type="text" name="mark" class="form-control" placeholder="marko do Equipamento">
                        @if($errors->has('mark'))
                        <span class="help-block">
                            <strong>{{$errors->first('mark')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('serialnumber') ? 'has-error' : '' }}">
                            <label for="serialnumber">Número de Série</label>
                            <input type="text" name="serialnumber" class="form-control" placeholder="Numero de Série do equipamento">
                        @if($errors->has('serialnumber'))
                        <span class="help-block">
                            <strong>{{$errors->first('serialnumber')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group">
                           <label>Status</label>
                            <select class="form-control" name="active" id="active">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
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

                        

                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Adicionar</button> 
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



