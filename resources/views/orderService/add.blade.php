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

                    <form action="{{ route('orderService.save') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="people_id">Id Pessoa</label>
                        <input  readOnly = "true" type="text" name="people_id" value="1" class="form-control" placeholder="ID do Usuário">
                    </div>
                        <div class="form-group {{$errors->has('problem') ? 'has-error' : '' }}">
                            <label for="problem">Nome</label>
                            <input type="text" name="problem" class="form-control" placeholder="Nome do orderServiceo">
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
                            <select class="form-control"  name="patients_id" id="patients_id">
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


@stop



