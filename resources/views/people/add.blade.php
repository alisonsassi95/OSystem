@extends('adminlte::page')

@section('title', 'Cadastro de Pessoas')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Pessoas</h3>
 </div>
    <div role="form">
        <div class="box-body">
            @include('sweet::alert')
                    <form action="{{ route('people.save') }}" method="post">
                    {{ csrf_field() }}
                        
                    <div class="form-group col-md-12">
                        <label for="profile" >Tipo</label>
                        <div required name="profile" class="auto-control" value="{{ old('profile') }}" required autofocus>
                        <select class="form-control"  id = "profile" name="profile" onchange="habilitaBtn()" >
                            <option value="1">Administrador</option>
                            <option  selected value="2">Cliente</option>
                        </select>
                        @if($errors->has('profile'))
                        <span class="help-block">
                            <strong>{{$errors->first('profile')}}</strong>
                        </span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group col-md-8 {{$errors->has('name') ? 'has-error' : '' }}" value="{{ old('name') }}">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome do cliente">
                        @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class=" form-group col-md-3" value="{{ old('birthdate') }}">
                            <label for="birthdate">Data de nascimento</label>
                            <input type="date" name="birthdate" class="form-control" placeholder="Data de nascimento">
                        </div>


                        <div class=" form-group col-md-1" value="{{ old('genre') }}">
                            <label for="genre">Genero</label>
                            <select class="form-control" name = "genre">
                                <option value="">Selecione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 {{$errors->has('cpf') ? 'has-error' : '' }}" value="{{ old('cpf') }}">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id= "cpf"  class="form-control" placeholder="999.999.999-99" >
                        @if($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{$errors->first('cpf')}}</strong>
                        </span>
                        @endif
                        <!-- tutorial para retornar com os valores sem as mascaras-->
                        <!-- https://respostas.guj.com.br/35641-recuperar-valor-do-inputmask-sem-a-mascara-primefaces -->
                        <!-- https://www.botecodigital.info/jquery/criando-mascaras-de-input-com-jquery-mask-plugin/ --> 
                        </div>

                        <div class="form-group col-md-6">
                            <label for="rg">RG</label>
                            <input type="text" name="rg" id ="rg" class="form-control" placeholder="9999.999.99-9">
                        </div>

                        <div  class="form-group col-md-2">
                            <label for="state">Estado</label>
                            <select  name ='state' class="form-control" value='' id="state" ></select>
                            <small class="text-danger"></small>
                        </div>

                        <div class="form-group col-md-2">
                                <label for="cep">CEP</label>
                                <input class="form-control" name="cep" type="text" id="cep"  placeholder="99.999-999">
                                <small class="text-danger"></small>
                        </div>

                        <div  class="form-group col-md-8">
                            <label for="city">Cidade</label>
                            <select  name ='city' class="form-control" value='' id="city"></select>
                            <small class="text-danger"></small>
                        </div>
                                               

                        <div class="form-group col-md-8 {{$errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" class="form-control" placeholder="Endereço do cliente">
                            @if($errors->has('address'))
                        <span class="help-block">
                            <strong>{{$errors->first('address')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group col-md-1">
                            <label for="number">Número</label>
                            <input type="text" name="number" class="form-control" placeholder="Número residência">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="district">Bairro</label>
                            <input type="text" name="district" class="form-control" placeholder="Bairro">
                        </div>

                        <div class="form-group col-md-8">
                            <label for="complement">Complemento</label>
                            <input type="text" name="complement" class="form-control" placeholder="Complemento">
                        </div>

                        <div class="form-group col-md-4 {{$errors->has('telephone') ? 'has-error' : '' }}">
                            <label for="telephone">Telefone</label>
                            <input type="text" name="telephone" id = "telephone" class="form-control" placeholder="Telefone do cliente">
                        @if($errors->has('telephone'))
                        <span class="help-block">
                            <strong>{{$errors->first('telephone')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group col-md-12 {{$errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail do cliente">
                            @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group col-md-12 {{$errors->has('obs') ? 'has-error' : '' }}">
                            <label for="obs">Observação</label>
                            <input type="textarea" name="obs" class="form-control" placeholder="Observação">
                            @if($errors->has('obs'))
                        <span class="help-block">
                            <strong>{{$errors->first('obs')}}</strong>
                        </span>
                        @endif
                        </div>
                        <div class="col-md-12"> 
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Adicionar</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

                    <!-- Inicio Especialidade Modal -->
                    <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Especialidade</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('specialty.save') }}" method="post">
                                        {{ csrf_field() }}
                                        
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Nome:</label>
                                            <input name="name" type="text" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">Detalhes:</label>
                                            <textarea name="description" class="form-control"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Especialidade Modal -->
@stop


 
<!-- validação dos medicos -->
<script type="text/javascript">
    function habilitaBtn () {
        var op = document.getElementById("profile").value;

        if(op == "4") // Paciente
        {
            document.getElementById('medico').style.display = 'none';
            document.getElementById('funcionario').style.display = 'none';
        }

        if(op == "3") // Medico
        {
            document.getElementById('medico').style.display = 'block';
            document.getElementById('funcionario').style.display = 'none';
            document.getElementById('crm').required = true;
        }

        if(op == "2") // Funcionário
        {
            document.getElementById('funcionario').style.display = 'block';
            document.getElementById('medico').style.display = 'none';
            document.getElementById('cargo').required = true;
        }
    }

    //<!-- validação dos medicos -->
    function addCert() {
    var lista = document.getElementsByName('certificados[]');
    var ultimoLista = lista[lista.length - 1];
    var novoCert = ultimoLista.cloneNode(true);
    var formPai = ultimoLista.parentNode; //ou document.getElementById('id_do_form');
    formPai.insertBefore(novoCert, ultimoLista.nextSibling);
}
</script>
<!-- validação dos medicos -->
