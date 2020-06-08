<!DOCTYPE html>
<html lang="pr-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/main1.css') }}">
    <link rel="stylesheet" href="{{ asset('../css/table.css') }}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="{{ asset('../js/main.js') }}"></script>


    <title>OSystem</title>
</head>

<ul class="navbar">
    <li class="navbar-item"><a href="{{ route('main')}}">Inicio</a></li>
    <li class="navbar-item"><a href="{{ route('whoareus')}}">Quem somos</a></li>
    <li class="navbar-item"><a class="active" href="{{ route('prices')}}">Preços</a></li>
    <li class="navbar-item"><a href="{{ route('contact')}}">Contato</a></li>
    <li class="navbar-item"><a href="{{ route('login')}}">Área do Cliente</a></li>
</ul>

<body>

    <div class="table-title">
        <h3>Tabela de Preços</h3>
    </div>
    <table class="table-fill">
        <thead>
            <tr>
                <th class="text-left">Serviço</th>
                <th class="text-left">Prazo</th>
                <th class="text-left">Preço</th>
            </tr>
        </thead>
        <tbody class="table-hover">
            <tr>
                <td class="text-left">Formatação</td>
                <td class="text-left">2 dias úteis</td>
                <td class="text-left">R$ 95,00</td>
            </tr>
            <tr>
                <td class="text-left">Remoção de Vírus</td>
                <td class="text-left">1 dia útil</td>
                <td class="text-left">R$ 45,00</td>
            </tr>
            <tr>
                <td class="text-left">Manutenção de Hardware</td>
                <td class="text-left">Consulte-nos</td>
                <td class="text-left">Consulte-nos</td>
            </tr>
        </tbody>
    </table>

</body>

</div>

<footer class=" footer">
    <p>© 2020 Feito com <b style="color: red;">❤</b> por Vongrafen&Sassi Company. Todos os direitos reservados</p>
    <p class="pol"><a href="#politica">Política de Privacidade</a> | <a href="#termos">Termos de Uso</a> | <a href="#empregos">Empregos</a> | <a href="#investidores">Investidores</a> | <a href="#conosco">Fale Conosco</a></p>
</footer>

</html>