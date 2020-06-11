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

    public function save(Request $request, People $people)
    {

        $people->create($request->all());
        return redirect()->route('people.index')->with('success', 'Pessoa deletada com sucesso!');

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
