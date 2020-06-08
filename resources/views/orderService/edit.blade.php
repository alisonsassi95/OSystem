@extends('adminlte::page')

@section('title', 'Editar Equipamentos')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
       <h3 class="box-title">Editar Equipamento</h3>
    </div>
    <div role="form">
    <div class="box-body">

                    <form action="{{ route('equipament.update', $equipament->id) }}" method="post">
                    {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">


                                <div class="form-group">
                                    <label>Equipamento</label>
                                    <select class="form-control"  value="{{$equipament->name}}"  name="equipaments_id" id="equipaments_id">
                                        <option value="">Selecione um Equipamento</option>       
                                        @foreach($equipaments as $equipaments)
                                        <option required value="{{ $equipaments->id }}">{{ $equipaments->name }} - Modelo - {{ $equipaments->model }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                
            
                                <div class="form-group {{$errors->has('problem') ? 'has-error' : '' }}">
                                    <label for="problem">Problema</label>
                                    <input type="text" name="problem" value="{{$orderService->problem}}" class="form-control" placeholder="Problema da orderServiceo">
                                    @if($errors->has('problem'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('problem')}}</strong>
                                    </span>
                                    @endif
                                </div> 
                                
                                <div class=" form-group col-md-3" value="{{ old('data_hora') }}">
                                    <label for="data_hora">Data de solicitação</label>
                                    <input readOnly = "true" type="datetime" value="{{$orderService->data_hora}}" name="data_hora" class="form-control" value="<?php echo date('Y-m-d h:m:s');?>" placeholder="Data Atual">
                                </div>

                                <div class=" form-group col-md-3" value="{{ old('data_hora_entrega') }}">
                                    <label for="data_hora_entrega">Data de Entrega</label>
                                    <input type="date" name="data_hora_entrega" value="{{$orderService->data_hora_entrega}}" class="form-control" placeholder="Data de entrega">
                                </div>
                                
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-check"></i >Salvar</button>
                    </form>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 

        </div>
    </div>
</div>
@stop