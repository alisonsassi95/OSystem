<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/main.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/card.css') }}">
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <!-- DataTable  -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <!-- sweetalert  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables with bootstrap 3 style -->
        <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css">
    @endif
    
   

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')
<!-- Scripts -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>




<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<!-- Máscaras  -->
<script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
<!-- cidadeEstado  -->
<script src="{{ asset('js/cidadeEstado.js') }}"></script>
<!-- sweetalert  -->
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endif

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables with bootstrap 3 renderer -->
    <script src="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
@endif

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->


   
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
@endif

@yield('adminlte_js')

<script>
$(document).ready( function () {
    $('#tableDepartament').DataTable();


            new dgCidadesEstados({
            cidade: document.getElementById('city'),
            estado: document.getElementById('state')
        })
    } );

    $('#textarea').ckeditor();
</script>

<script>

document.getElementById('mensagem-sucesso').onclick = function(){
    swal('Boa!', 'Cadastrado com Sucesso', 'success')
};

document.getElementById('mensagem-erro').onclick = function(){
    swal('Oh no...', 'Algo deu errado!', 'error')
};


</script>
<script type="text/javascript">
    $(function() {
        $.mask.definitions['~'] = "[+-]";
       $("#telephone").mask("(99)9.9999-9999");
        $("#cpf").mask("999.999.999-99"); //.mask("99999999999");
        $("#rg").mask("9999999999");
        $("#cep").mask("99.999-999");
        $("#performed_date").mask("9999-99-99 99:99:99");
        
       //    EXEMPLOS
       //$("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy",completed:function(){alert("completed!");}});
        //$("#product").mask("a*-999-a999", { placeholder: " " });
        //$("#eyescript").mask("~9.99 ~9.99 999");
        //$("#po").mask("PO: aaa-999-***");
        //$("#pct").mask("99%");
        //$("#phoneAutoclearFalse").mask("(999) 999-9999", { autoclear: false, completed:function(){alert("completed autoclear!");} });
        //$("#phoneExtAutoclearFalse").mask("(999) 999-9999? x99999", { autoclear: false });
        

        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
            //$("#cpf").unmask($(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });
    });

</script> 

</body>
</html>
