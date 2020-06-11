<!DOCTYPE html>
<html lang="pr-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('../css/main2.css') }}">
    <link rel="stylesheet" href="{{ asset('../css/contact.css') }}">
    <script src="{{ asset('../js/main.js') }}"><\script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <title>OSystem</title>
</head>

<ul class="navbar">
    <li class="navbar-item"><a href="{{ route('main')}}">Inicio</a></li>
    <li class="navbar-item"><a href="{{ route('whoareus')}}">Quem somos</a></li>
    <li class="navbar-item"><a href="{{ route('prices')}}">Preços</a></li>
    <li class="navbar-item"><a href="{{ route('contact')}}">Contato</a></li>
    <li class="navbar-item"><a class="active"href="{{ route('login')}}">Área do Cliente</a></li>
</ul>

<div class="container">
    <header>
        <div class="row">
            <h1>Insira seus Dados</h1>
        </div>
        <div>
            <h4>Preencha o formulário</h2>
        </div>
    </header>

    <body>
    @include('sweet::alert')
        <div class="row input-container">
            <form action="{{ route('RegisterForm') }}" method="get">
                {{ csrf_field() }}
                <div class=" form-group">
                    <select class="form-control" name = "ativo">
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="form-group">
                    <input  readOnly = "true" type="text" name="people_id" class="form-control" value ="1">
                </div>
                <div class="form-group">         
                                <input readOnly = "true" type="text" value= "Cliente" name="profile"  class="form-control">
                </div>
                <div class="styled-input wide">
                    <input type="text" name="name" id="name" placeholder="Nome" value="" data-use-type="STRING" maxlength="30" required>
                </div>

                <div class="styled-input">
                    <input type="text" name="cpf" id="cpf" placeholder="cpf" size="20" value="" maxlength="14">
                </div>

                <div class="styled-input" style="float:right;">
                    <input type="text" type="contact" name="contact" id="contact" placeholder="Telefone" maxlength="50" required>
                </div>

                <div class="styled-input wide" style="float:right;">
                    <input type="text" type="email" name="email" id="email" placeholder="E-mail" maxlength="50" required>
                </div>

                <div class="styled-input wide">
                    <input type="text" name="user" id="user" placeholder="Nome de usuário" value="" data-use-type="STRING" maxlength="30" required>
                </div>

                <div class="styled-input wide">
                <input type="password" name="password" class="form-control" placeholder="Digite a senha" required >
                </div>
               
                <button class="btn-lrg submit-btn">Cadastrar</button>
               
            </form>
            
        </div>
    </body>
   
</div>

<footer class=" footer">
    <p>© 2020 Feito com <b style="color: red;">❤</b> por Vongrafen&Sassi Company. Todos os direitos reservados</p>
    <p class="pol"><a href="#politica">Política de Privacidade</a> | <a href="#termos">Termos de Uso</a> | <a href="#empregos">Empregos</a> | <a href="#investidores">Investidores</a> | <a href="#conosco">Fale Conosco</a></p>
</footer>

</html>