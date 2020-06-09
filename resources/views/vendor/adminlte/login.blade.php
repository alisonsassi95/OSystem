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
    <li class="navbar-item"><a class="active" href="{{ route('login')}}">Área do Cliente</a></li>
</ul>

<div class="container">
    <header>
        <div class="row">
            <h1>Entre com suas credênciais para logar</h1>
        </div>
    </header>

    <body>
    <div class="login-box">
        <div class="row input-container">
            <p class="login-box-msg">Entre com suas credênciais para logar</p>
            <form action="authentication" method="post">
                {!! csrf_field() !!}

                <div class="styled-input wide {{ $errors->has('user') ? 'has-error' : '' }}">
                    <input type="user" name="user" class="form-control" value="{{ old('user') }}"
                           placeholder="Usuário">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('user'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user') }}</strong>
                        </span>
                    @endif
                </div>
                <br>
                <div class="styled-input wide {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="Senha">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit"
                                class="btn-lrg submit-btn">Login</button>
                    </div>
                    <br>
                    <br>
                    <a class="navbar-item" class="active" href="{{ route('register')}}">Cadastre-se</a>
                    <br>
                    <p href="">Esqueci minha senha</a></li></p>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
    </body>

</div>

<footer class=" footer">
    <p>© 2020 Feito com <b style="color: red;">❤</b> por Vongrafen&Sassi Company. Todos os direitos reservados</p>
    <p class="pol"><a href="#politica">Política de Privacidade</a> | <a href="#termos">Termos de Uso</a> | <a href="#empregos">Empregos</a> | <a href="#investidores">Investidores</a> | <a href="#conosco">Fale Conosco</a></p>
</footer>

</html>
