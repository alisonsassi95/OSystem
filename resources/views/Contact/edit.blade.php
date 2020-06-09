@extends('adminlte::page')

@section('title', 'Editar Contatos')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
       <h3 class="box-title">Editar Contatos</h3>
    </div>
    <div role="form">
    <div class="box-body">

                    <form action="{{ route('Contact.update', $Contact->id) }}" method="post">
                    {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">

                                    <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Nome</label>
                                        <input type="text" name="name" class="form-control" value="{{$Contact->name}}" placeholder="Nome do Contacto">
                                        @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('name')}}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="cnpj">CNPJ</label>
                                        <input type="text" value="{{$Contact->cnpj}}" name="cnpj" class="form-control" placeholder="cnpjo do Contacto">
                                    @if($errors->has('cnpj'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('cnpj')}}</strong>
                                    </span>
                                    @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_phone">Telefone</label>
                                        <input type="text" name="contact_phone" value="{{$Contact->contact_phone}}" class="form-control" placeholder="contact_phoneo do Contacto">
                                        @if($errors->has('contact_phone'))
                                        <span class="help-block">
                                            <strong>{{$errors->first('contact_phone')}}</strong>
                                        </span>
                                        @endif
                                    </div>
                        
                                    <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
                                        <label for="email">E-mail</label>
                                        <input type="text" value="{{$Contact->email}}" name="email" class="form-control" placeholder="Numero de Série do Contacto">
                                    @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('email')}}</strong>
                                    </span>
                                    @endif
                                    </div>
        
                                    <div class="form-group {{$errors->has('description') ? 'has-error' : '' }}">
                                    <label for="description">Mensagem</label>
                                        <textarea for="description" value="{{$Contact->description}}" type="text" id="description" class="form-control rounded-0 {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>Descrição</textarea>
            
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