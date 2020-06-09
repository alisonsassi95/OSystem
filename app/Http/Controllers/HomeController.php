<?php

namespace App\Http\Controllers;


use App\User;
use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // para usar o SQL
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         
        $user = auth()->user()->people_id;
        $perfil = auth()->user()->profile;
        
        $sql = ('SELECT 
        orderservice.id,
        peoples.name as peoples, 
        equipaments.name as equipaments, 
        orderservice.problem as problem, 
        DATE_FORMAT(orderservice.data_hora , "%d/%m/%Y" ) as data_solicitacao,
        estimate.value as value,
        status.name as status,
        status.description as statusDescricao
        FROM orderservice
        left join equipaments ON equipaments.id = orderservice.equipaments_id
        left join peoples on peoples.id = orderservice.peoples_id
        left join estimate on estimate.id = orderservice.estimate_id
        left join status on status.id = orderservice.status_id');

        if($perfil =='Cliente'){
            $Result = ($sql . ' WHERE peoples.id =' . $user);
        }else{
            $Result = ($sql);
        }        
        $orderServices = DB::select($Result); 


        $sql = ('SELECT 
        orderservice.id as order_all
        FROM orderservice
        left join peoples on peoples.id = orderservice.peoples_id');

        if($perfil =='Cliente'){
            $Result = ($sql . ' WHERE peoples.id =' . $user);
        }else{
            $Result = ($sql);
        }        
        $orderServicesrequested = DB::select($Result);

        $sql = ('SELECT 
        orderservice.id as order_all
        FROM orderservice
        left join peoples on peoples.id = orderservice.peoples_id
        WHERE orderservice.status_id = 6');

        if($perfil =='Cliente'){
            $Result = ($sql . ' AND peoples.id =' . $user);
        }else{
            $Result = ($sql);
        }        
        $orderServicesrealized = DB::select($Result);

        $Usuarios = DB::select('SELECT * FROM users'); 
        $Clientes = DB::select('SELECT * FROM peoples WHERE peoples.profile = 2 '); 

        return view('home', [
            'Usuarios' => $Usuarios,
            'Clientes' => $Clientes,
            'orderServices' => $orderServices,
            'orderServicesrequested' => $orderServicesrequested,
            'orderServicesrealized' => $orderServicesrealized,
            ]);
    }
}
