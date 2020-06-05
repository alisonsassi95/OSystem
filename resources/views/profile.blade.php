@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Perfil</h1>
@stop

@section('content')
<div class="panel-body">
        <img src="/imagens/avatar/{{Auth::user()->avatar}}" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px;">
        <h2>{{$peoples->name}}</h2>
        <form enctype="multipart/form-data" action="{{route('User.perfilAtualiza')}}" method="POST">
        <label>Atualizar imagem do perfil</label>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" class="pull-right btn btn-sm btn-primary"> 	
        </form>
    </div>
    <form action="{{ route('User.updateProfile', $peoples->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
            <!-- Profile Image -->
            
        <div class="box box-primary">
            <div class="box-body box-profile">

                    {{-- <div class="panel-body">
                            <img src="/imagens/avatar/{{Auth::user()->avatar}}" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px;">
                             <h2>{{$peoples->name}}</h2>
                    </div> --}}

            {{-- <img class="profile-user-img img-responsive img-circle" src="/imagens/avatar/{{Auth::user()->avatar}}" alt="User profile picture">           
            <h3 class="profile-username text-center">{{$peoples->name}}</h3> --}}
                      <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                        <h3 class="box-title">Aqui você pode editar seus dados!</h3>
                        </div>
                        <div class="box-body">
                        <div class="table-responsive">
                        @include('sweet::alert')
                            <table class="table no-margin">
                                    <tbody>

                                            <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                                                <label for="name">Nome</label>
                                                <input type="text" value="{{$peoples->name}}" name="name" class="form-control" placeholder="Nome do cliente">
                                            @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('name')}}</strong>
                                            </span>
                                            @endif
                                            </div>

                                            <div class=" form-group" value="{{ old('birthdate') }}">
                                                <label for="birthdate">Data de nascimento</label>
                                                <input type="date" name="birthdate" value="{{$peoples->birthdate}}" class="form-control" placeholder="Data de nascimento">
                                            </div>


                                            <div class=" form-group" >
                                                <label for="genre">Genero</label>
                                                <select class="form-control" value="{{$peoples->genre}}" name = "genre">
                                                    @if($peoples->genre == 'M')
                                                    <option value= "{{ $peoples->genre }}" >Masculino</option>
                                                    <option value="F">Femenino</option>
                                                    @endif
                                                    @if($peoples->genre == 'F')
                                                    <option value= "{{ $peoples->genre }}" >Feminino</option>
                                                    <option value="M">Masculino</option>
                                                    @endif
                                                    @if($peoples->genre == '')
                                                    <option value= "{{ $peoples->genre }}" >Selecione</option>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="form-group {{$errors->has('cpf') ? 'has-error' : '' }}" value="{{ old('cpf') }}">
                                                <label for="cpf">CPF</label>
                                                <input disabled=true  type="text" name="cpf" value="{{$peoples->cpf}}" id= "cpf"  class="form-control" placeholder="999.999.999-99" >
                                            @if($errors->has('cpf'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('cpf')}}</strong>
                                            </span>
                                            @endif
                                        </div>

                                            <div class="form-group">
                                                <label for="rg">RG</label>
                                                <input type="text" value="{{$peoples->rg}}" name="rg" id ="rg" class="form-control" placeholder="9999.999.99-9">
                                            </div>

                                            <div  class="form-group ">
                                                <label for="state">Estado</label>
                                                <select  name ='state' value="{{$peoples->state}}" class="form-control" value='' id="state" ></select>
                                                <small class="text-danger"></small>
                                            </div>

                                            <div  class="form-group ">
                                                <label for="city">Cidade</label>
                                                <select  name ='city' class="form-control" value="{{$peoples->city}}" id="city"></select>
                                                <small class="text-danger"></small>
                                            </div>

                                            <div class="form-group">
                                                <label for="cep">CEP</label>
                                                <input class="form-control" name="cep" value="{{$peoples->cep}}" type="text" id="cep"  placeholder="99.999-999">
                                                <small class="text-danger"></small>
                                            </div>

                                            <div class="form-group {{$errors->has('address') ? 'has-error' : '' }}">
                                                <label for="address">Endereço</label>
                                                <input type="text" name="address" value="{{$peoples->address}}" class="form-control" placeholder="Endereço do cliente">
                                                @if($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('address')}}</strong>
                                            </span>
                                            @endif
                                            </div>

                                            <div class="form-group ">
                                                <label for="number">Número</label>
                                                <input type="text" name="number" value="{{$peoples->number}}" class="form-control" placeholder="Número residência">
                                            </div>

                                            <div class="form-group ">
                                                <label for="district">Bairro</label>
                                                <input type="text" name="district" value="{{$peoples->disctict}}" class="form-control" placeholder="Bairro">
                                            </div>

                                            <div class="form-group ">
                                                <label for="complement">Complemento</label>
                                                <input type="text" name="complement" value="{{$peoples->complement}}" class="form-control" placeholder="Complemento">
                                            </div>

                                            <div class="form-group {{$errors->has('telephone') ? 'has-error' : '' }}">
                                                <label for="telephone">Telefone</label>
                                                <input type="text" name="telephone" value="{{$peoples->telephone}}" id = "telephone" class="form-control" placeholder="Telefone do cliente">
                                            @if($errors->has('telephone'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('telephone')}}</strong>
                                            </span>
                                            @endif
                                            </div>

                                            <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
                                                <label for="email">E-mail</label>
                                                <input readOnly = "true" type="email" name="email" value="{{$peoples->email}}" class="form-control" placeholder="E-mail do cliente">
                                                @if($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('email')}}</strong>
                                            </span>
                                            @endif
                                            </div>

                                            <div class="form-group {{$errors->has('obs') ? 'has-error' : '' }}">
                                                <label for="obs">Observação</label>
                                                <input type="textarea" name="obs" value="{{$peoples->obs}}" class="form-control" placeholder="Observação">
                                                @if($errors->has('obs'))
                                            <span class="help-block">
                                                <strong>{{$errors->first('obs')}}</strong>
                                            </span>
                                            @endif
                                            </div>
                                     </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block"> <b><i class="glyphicon glyphicon-save"></i > Salvar</b> </button>
                    <button href="{{ URL::previous() }}" class="btn btn-primary btn-block"><b>Sair</b></button>
            </div>
        </div>
    </form>
@stop