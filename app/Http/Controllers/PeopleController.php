<?php

namespace App\Http\Controllers;

use Session;
use App\People;
use App\User;
use Illuminate\Http\Request;
use Alert;


class PeopleController extends Controller
{

    protected $peopleModel;
    public function __construct(People $peopleModel)
    {   
        $this->peopleModel = $peopleModel;
        $this->middleware('auth');
    }

    public function __constructU(user $user)
    {   
        $this->user = $user;
        $this->middleware('auth');
    }


    public function index()
    {
        $peoples = $this->peopleModel->paginate(20); // whereNotNull('rg')->
        return view('people.index', ['peoples' => $peoples]);
    }

    public function menu()
    {
        return view('people.menu');
    }

    public function detail($id)
    {
        $people = People::find($id);
        return view('people.detail', compact('people'));
    }

    public function save(\App\Http\Requests\PeopleRequest $request)
    {
        $insert = 0;
       try{
            $insert = People::create($request->all());

       }catch(Exception $e){
           echo('Erro!');
    }finally{
        $tipopessoa = $request->get('profile');
        if ($insert){    // Verifica se inseriu com sucesso
            return redirect()
                        ->route('people.index')
                        ->with('error', 'Tipo de Pessoa Inválido!');
        }
   return redirect()
                ->route('people.add')
                ->with('error', 'Dados cadastrais Incompletos!');
    }
}

public function saveForm(\App\Http\Requests\PeopleRequest $request)
{
    dd('teste');

    
    $insert = 0;
 
    dd($insert);
    try{
        $insert = People::create($request->all());
        $insert = User::create($request->all());
        return redirect()
                    ->route('register')
                    ->with('error', 'Cadastrado com Sucesso!');

   }catch(Exception $e){
       echo('Erro!');
       return redirect()
                    ->route('register')
                    ->with('error', 'Erro ao cadastrar');
    }
}

public function add()
    {   
        return view('people.add');
    }
    public function edit ($id)
    {
        $people = People::find($id);
        if(!$people){
            return redirect()->route('people.add');
        }
        return view('people.edit', compact('people'));
    }

    public function update(Request $request, $id)
    {
        People::find($id)->update($request->all());
        return redirect()
            ->route('people.index')
            ->with('info', 'Atualizado com sucesso!');        
        
    }

    public function delete($id)
    {
        $people = People::find($id);
        
        $people->delete();
        return redirect()
            ->route('people.index')
            ->with('success', 'Pessoa deletada com sucesso!');      
        
    }
}
