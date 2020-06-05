@extends('adminlte::page')

@section('title', 'Cadastro de Pessoas')

@section('content')

<html>
<head>
<title>Demo of page redirection after selection of a drop down listbox menu</title>
<script language="javascript">
function selectRedirect() {

switch(document.getElementById('s1').value)
{
case "Cadastrar Médico":
window.location="add";
break;

case "Cadastrar Funcionário":
window.location="../asp-tutorial/site_map.php";
break;

case "Cadastrar Paciente":
window.location="../sql_tutorial/site_map.php";
break;

/// Can be extended to other different selections of SubCategory //////
default:
window.location="../"; // if no selection matches then redirected to home page
break;
}// end of switch 
//////////////////
} 
</script>
</head>
<body>

<SELECT id="s1" NAME="section" onChange="selectRedirect();">
<Option value="">Select Section</option>
<Option value="Cadastrar Médico">Cadastrar Médico</option>
<Option value="Cadastrar Funcionário">Cadastrar Funcionário</option>
<Option value="Cadastrar Paciente">Cadastrar Paciente</option>
</SELECT>

</body>
</html>

@stop