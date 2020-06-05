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



                                <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Nome</label>
                                        <input type="text" value="{{$equipament->name}}" name="name" class="form-control" placeholder="Nome do Equipamento">
                                    @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                    @endif
                                    </div>
            
                                    <div class="form-group">
                                        <label for="model">Modelo</label>
                                        <input type="text" value="{{$equipament->model}}" name="model" class="form-control" placeholder="Modelo do Equipamento">
                                    @if($errors->has('model'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('model')}}</strong>
                                    </span>
                                    @endif
                                    </div>
            
                                    <div class="form-group {{$errors->has('serialnumber') ? 'has-error' : '' }}">
                                        <label for="serialnumber">Número de Série</label>
                                        <input type="text" value="{{$equipament->serialnumber}}" name="serialnumber" class="form-control" placeholder="Numero de Série do equipamento">
                                    @if($errors->has('serialnumber'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('serialnumber')}}</strong>
                                    </span>
                                    @endif
                                    </div>
            

                                    <div class="form-group">
                                            <label>Status</label>
                                             <select class="form-control"  value="{{$equipament->ativo}}" name="active" id="active">
                                                 <option value="1">Ativo</option>
                                                 <option value="0">Inativo</option>
                                             </select>
                                    </div>

      
                                        <label for="status">Tipo de Equipamento</label>
                                        <select class="form-control"  name="examtype_id" id="examtype_id">
                                            @foreach($results as $examtype)
                                             @if($equipament->examtype_id == $examtype->id )
                                                <option value= "{{ $examtype->id }}" >{{$examtype->name}}</option>
                                            @endif
                                            <option value="{{$examtype->id}}">{{$examtype->name}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                       
                                    <div class="form-group {{$errors->has('description') ? 'has-error' : '' }}">
                                    <label for="description">Descrição</label>
                                        <textarea for="description" value="{{$equipament->description}}" type="text" id="description" class="form-control rounded-0 {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>Descrição</textarea>
            
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
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