@extends('adminlte::page')

@section('title', 'Cadastro de Usuários')

@section('content')


<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Usuários</h3>
 </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @include('sweet::alert')
            <div class="panel panel-default">

            <ol class="breadcrumb panel-heading" >
            <li><a style="font-size:110%" href="{{ URL::previous() }}"><b>Usuários</b></a></li>
            <li class="active" style="font-size:110%">Adicionar</li>
            </ol>

                    <form action="{{ route('User.save') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}


                        <!-- Fazer esse formulário de editar também value= "{ {$results->email or old('email')}}" -->
                        <div class="form-group">
                                <label for="people_id">Id Pessoa</label>
                                <input  readOnly = "true" type="text" name="people_id" value= "{{ $people->id}}" class="form-control" placeholder="ID do Usuário">
                            </div>

                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input  readOnly = "true" type="text" name="name" value= "{{ $people->name}}" class="form-control" placeholder="Nome do Usuário">
                        </div>

                        <div class="form-group {{$errors->has('profile') ? 'has-error' : '' }}" value= "{{ old('profile')}}" >
                                <label for="profile">Perfil</label>
                                @if( $people->profile == 1)
                                    <input readOnly = "true"  type="text" value= "Admininstrador" name="profile"  class="form-control">
                                @endif
                                @if( $people->profile == 2)
                                    <input readOnly = "true" type="text" value= "Funcionário" name="profile"  class="form-control">
                                @endif
                                @if( $people->profile == 3)
                                    <input readOnly = "true" type="text" value= "Médico" name="profile"  class="form-control">
                                @endif
                                @if( $people->profile == 4)
                                <input readOnly = "true" type="text" value= "Cliente" name="profile"  class="form-control">
                            @endif   
                            </div>
                        <div class=" form-group" value= "{{ old('user')}}">
                            <label required for="user">Nome de Login</label>
                            <input type="text" name="user" value= "{{ $people->email }}" class="form-control" placeholder="Nome de login">
                        </div>

                        <!-- http://opensource.locaweb.com.br/locawebstyle-v2/manual/formularios/forca-de-senha/-->

                        <div class=" form-group {{$errors->has('name') ? 'has-error' : '' }}">
                            <label for="password">Senha</label>
                            <input type="password" name="password" class="form-control" placeholder="Digite a senha">
                            <p class="info-label">Senha entre 8 a 14 caracteres, contendo letras e números</p>
                            @if($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{$errors->first('password')}}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}" value= "{{ old('email')}}">
                            <label for="email">E-mail</label>
                            <input readOnly = "true" type="email" name="email"  value= "{{  $people->email }}" class="form-control" placeholder="E-mail do Usuário">
                        </div>

                        <div class=" form-group" value="{{ old('ativo') }}">
                            <label for="ativo">Ativo</label>
                            <select class="form-control" name = "ativo">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>

                        <button class=" form-group btn btn-info"><i class="glyphicon glyphicon-plus"></i > Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop