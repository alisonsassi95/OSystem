<!DOCTYPE html>
<html lang="pr-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('../css/main1.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <title>OSystem</title>
</head>

<ul class="navbar">
    <li class="navbar-item"><a class="active" href="{{ route('main')}}">Inicio</a></li>
    <li class="navbar-item"><a href="{{ route('whoareus')}}">Quem somos</a></li>
    <li class="navbar-item"><a href="{{ route('prices')}}">Preços</a></li>
    <li class="navbar-item"><a href="{{ route('contact')}}">Contato</a></li>
    <li class="navbar-item"><a href="{{ route('login')}}">Área do Cliente</a></li>
</ul>

<body>

    
    <div class="cards">
        
            <div class="card">
                <a class="cards_a" href="{{ route('prices')}}"> 
                    <img src="{!! asset('imagens/servicos/virus.png')!!}" alt="Avatar">
                    <div class="container">
                        <h4>Remoção de</h4>
                        <h1><b>Vírus</b></h1>
                    </div>
                </a>      
            </div>


            <div class="card">
                <a class="cards_a" href="{{ route('prices')}}">
                    <img src="{!! asset('imagens/servicos/formatar.png')!!}" alt="Avatar">
                    <div class="container">
                        <h4>Formatação de</h4>
                        <h1><b>Sistemas</b></h1>
                    </div>
                </a>
            </div>

            <div class="card">
                <a class="cards_a" href="{{ route('prices')}}">
                    <img src="{!! asset('imagens/servicos/hardware.png')!!}" alt="Avatar">
                    <div class="container">
                        <h4>Manutenção de</h4>
                        <h1><b>Hardware</b></h1>
                    </div>
                </a>
            </div>

    </div>
    
</body>

<footer class=" footer">
    <br><br>
    <title>Localização</title>
    <div id="mapa"></div>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqoon0XxFevdZdbG_cUr8OlCis6S3TyWM &callback=inicializar">
    </script>
    <style>
        #mapa {
            height: 200px;
            width: 100%;
        }
    </style>
    <p>© 2020 Feito com <b style="color: red;">❤</b> por Vongrafen&Sassi Company. Todos os direitos reservados</p>
    <p class="pol"><a href="#politica">Política de Privacidade</a> | <a href="#termos">Termos de Uso</a> | <a href="#empregos">Empregos</a> | <a href="#investidores">Investidores</a> | <a href="#conosco">Fale Conosco</a></p>
</footer>

<script>
    function inicializar() {
        var coordenadas = {
            lat: -28.388341,
            lng: -53.929673
        };

        var mapa = new google.maps.Map(document.getElementById('mapa'), {
            zoom: 15,
            center: coordenadas
        });

        var marker = new google.maps.Marker({
            position: coordenadas,
            map: mapa,
            title: 'Empresa'
        });
    }
</script>

</html>