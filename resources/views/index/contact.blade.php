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
            <h1>Seja um parceiro</h1>
        </div>
        <div>
            <h4>Preencha o formulário e aguarde nossa ligação.</h2>
        </div>
    </header>

    <body>
        <div class="row input-container">
        <form action="{{ route('UContact.save') }}" method="post">
                <div class="styled-input wide">
                    <input type="text" name="name" id="name" placeholder="Nome" value="" data-use-type="STRING" maxlength="30" required>
                </div>

                <div class="styled-input">
                    <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" pattern="^(\d{2}\.?\d{3}\.?\d{3}\/?\d{4}-?\d{2}|\d{3}\.?\d{3}\.?\d{3}-?\d{2})$" size="20" value="" maxlength="14">
                </div>

                <div class="styled-input" style="float:right;">
                    <input type="text" type="contact" name="contact_phone" id="contact_phone" placeholder="Telefone" maxlength="50" required>
                </div>

                <div class="styled-input wide" style="float:right;">
                    <input type="text" type="email" name="email" id="email" placeholder="E-mail" maxlength="50" required>
                </div>

                <div class="styled-input wide">
                    <textarea type="textarea" cols="50" rows="8" name="description" id="description" placeholder="Digite sua mensagem aqui!" value="" maxlength="255" required></textarea>
                </div>

                <button class="btn-lrg submit-btn">Enviar</button>

            </form>
        </div>
    </body>

</div>

<footer class=" footer">
    <p>© 2020 Feito com <b style="color: red;">❤</b> por Vongrafen&Sassi Company. Todos os direitos reservados</p>
    <p class="pol"><a href="#politica">Política de Privacidade</a> | <a href="#termos">Termos de Uso</a> | <a href="#empregos">Empregos</a> | <a href="#investidores">Investidores</a> | <a href="#conosco">Fale Conosco</a></p>
</footer>

</html>