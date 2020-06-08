<?php

namespace App\Http\Controllers;

use App\orderService;
use App\user;
use App\People;
use App\Equipament;
use Illuminate\Http\Request;
use App\Requests\userRequest;
use Alert;
use Illuminate\Support\Facades\DB; // para usar o SQL
class orderServiceController extends Controller
{
    protected $orderServiceModel;
    //Construtores responsaveis pela inicialização da Classe
    public function __construct(orderService $orderServiceModel)
    {   
        $this->orderServiceModel = $orderServiceModel;
        $this->middleware('auth');
    }
    public function __constructE(user $user)
    {   
        $this->user = $user;
        $this->middleware('auth');
    }

    public function __constructP(People $People)
    {   
        $this->People = $People;
        $this->middleware('auth');
    }

    public function __constructEq(Equipament $Equipament)
    {   
        $this->Equipament = $Equipament;
        $this->middleware('auth');
    }

    // Função responsavel por trazer todos os orderServiceos cadastrados
    public function index()
    {
        $People = DB::select('SELECT * FROM peoples');
        $orderServices = $this->orderServiceModel->paginate(20); // whereNotNull('rg')->
        $Equipament = DB::select('SELECT * FROM equipaments');

        
        return view('orderService.index', ['orderServices' => $orderServices,'People' => $People,'Equipament' => $Equipament, ]);
    }
    //Função responsável por exbibir o menu
    public function menu()
    {
        return view('orderService.menu');
    }

    public function detail($id)
    {
        $orderService = orderService::find($id);
        return view('orderService.detail', compact('orderService'));
    }
    // Função responsavel por trazer a tela de cadastro de orderServiceos
    public function add()
    {
        $user = user::all();
        $teste = DB::select('SELECT * FROM peoples WHERE peoples.id = 1');
        $equipaments = Equipament::all();

        return view('orderService.add', [
            'user' => $user,          
            'equipaments' => $equipaments,
            ]);
    }
    // Função Responsavel por salvar um novo orderServiceo no banco
    public function save(\App\Requests\orderServiceRequest $request)
    {
        $insert = 0;
        try{
            $insert = orderService::create($request->all());
        }catch(Exception $e){
            echo('Erro!');
        }finally{
            if ($insert){
            return redirect()
                ->route('orderService.index')
                ->with('success', 'Cadastrado com Sucesso!');
            }
        }
    }
    // Função Responsavel por trazer a tela de edição de orderServiceos
    public function edit ($id)
    {
        $orderService = orderService::find($id);
        $results = user::all();
        $equipaments = Equipament::all();
        if(!$orderService){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse orderServiceo cadastrado, deseja cadastrar um novo orderServiceo?",
                'class'=>"alert-danger"
            ]);
            return redirect()->back();
        }
        return view('orderService.edit', ['orderService' => $orderService,'results' => $results, 'equipaments' => $equipaments,]);
        
    }
    // Função Responsavel por salvar a edição de um orderServiceo
    public function update(Request $request, $id)
    {
        
        orderService::find($id)->update($request->all());

        return redirect()
                ->route('orderService.index')
                ->with('info', 'Atualizado com sucesso!');        
        
    }
    // Função Responsavel pela exclusão de um orderServiceo
    public function delete($id)
    {
        $orderService = orderService::find($id);
       

        /*if(!$orderService->deleteTelephone()){
            \Session::flash('flash_message', [
                'msg'=>"Registro não pode ser deletado",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('orderService.index');
        }*/
        
        $orderService->delete();

        alert()->success('', 'Deletado com Sucesso')->persistent('OK');

        return redirect()->route('orderService.index');        
        
    }
}
