<!DOCTYPE html>
<html lang="pr-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="{{ asset('../css/main1.css') }}">
        <script src="{{ asset('../js/main.js') }}"><\script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

        <title>OSystem</title>
    </head>

    <ul class="navbar">
        <li class="navbar-item"><a href="{{ route('main')}}">Inicio</a></li>
        <li class="navbar-item"><a class="active" href="{{ route('whoareus')}}">Quem somos</a></li>
        <li class="navbar-item"><a href="{{ route('prices')}}">Preços</a></li>
        <li class="navbar-item"><a href="{{ route('contact')}}">Contato</a></li>
        <li class="navbar-item"><a href="{{ route('login')}}">Área do Cliente</a></li>
    </ul>

    <body>

        <div class="description">
            <div>
                <h2>Nossa História</h2>
                <p>
                    Somos uma empresa que nasceu de um propósito muito firmado com o professor Dionatan Kitzmann Tietzmann, o qual propôs a criação dessa empresa.
                    <br>
                    Com muita vontade de crescer na vida, criamos esse CASE na área da informática.
                </p>
            </div>
    
            <div>
                <h2>Nossa Empresa</h2>
                <p>
                    Somos uma empresa que presta serviço de qualquer tipo relacionado à informática, onde vamos até a casa do cliente se for preciso, e realizamos o trabalho solicitado.
                    <br>
                    Para esse acontecimento temos inúmeros parceiros, que realizam esse serviço para nós em qualquer lugar do Brasil.
                </p>
            </div>
    
            <div>
                <h2>Nossos parceiros</h2>
                <div class="parceiros">
                    <div class="box-logo">
                        <img src="{!! asset('imagens/parceiros/intel.png')!!}">
                    </div>
                    <div class="box-logo">
                        <img src="{!! asset('imagens/parceiros/nvidia.png')!!}">
                    </div>
                    <div class="box-logo">
                        <img src="{!! asset('imagens/parceiros/unijui.png')!!}">
                    </div>
                    <div class="box-logo">
                        <img src="{!! asset('imagens/parceiros/dell.png')!!}">
                    </div>
                    <div class="box-logo">
                        <img src="{!! asset('imagens/parceiros/positivo.png')!!}"> 
                    </div>
                </div>
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