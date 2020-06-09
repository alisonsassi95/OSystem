@extends('adminlte::page')

@section('title', 'Cadastro de Equipamentos')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Equipamentos</h3>
 </div>
 <div role="form">
        <div class="box-body">
            @include('sweet::alert')

                    <form action="{{ route('equipament.save') }}" method="post">
                    {{ csrf_field() }}
                        
                        <div class="form-group {{$errors->has('peoples_id') ? 'has-error' : '' }}">
                            <input readOnly = "true" type="text" name="peoples_id" class="form-control" value="{{$user}}">
                        </div>

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


@stop



