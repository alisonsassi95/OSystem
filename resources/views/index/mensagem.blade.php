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
    <li class="navbar-item"><a class="active" href="{{ route('contact')}}">Contato</a></li>
    <li class="navbar-item"><a href="{{ route('login')}}">Área do Cliente</a></li>
</ul>

<div class="container">
    <header>
        <div class="row">
            <h1>Olá parceiro!</h1>
        </div>
        <br>
        <br>
        <br>
        <div>
            <h4>Sua mensagem foi enviada, logo entraremos em contato! <br> Obrigado pelo interesse.</h2>
        </div>
    </header>
   
</div>

<footer class=" footer">
    <p>© 2020 Feito com <b style="color: red;">❤</b> por Vongrafen&Sassi Company. Todos os direitos reservados</p>
    <p class="pol"><a href="#politica">Política de Privacidade</a> | <a href="#termos">Termos de Uso</a> | <a href="#empregos">Empregos</a> | <a href="#investidores">Investidores</a> | <a href="#conosco">Fale Conosco</a></p>
</footer>

</html>