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
        $Usuarios = DB::select('SELECT * FROM users');         
        return view('home', [
            'Usuarios' => $Usuarios,
            ]);
    }
}
