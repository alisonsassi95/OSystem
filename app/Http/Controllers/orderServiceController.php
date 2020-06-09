<?php

namespace App\Http\Controllers;

use App\orderService;
use App\user;
use App\People;
use App\Equipament;
use App\estimate;
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
        dd($People);
    }

    public function __constructEq(Equipament $Equipament)
    {   
        $this->Equipament = $Equipament;
        $this->middleware('auth');
    }

    // Função responsavel por trazer todos os orderServiceos cadastrados
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
      
      $StatusAll = DB::select('SELECT * FROM status');

        return view('orderService.index', ['orderServices' => $orderServices, 'StatusAll' => $StatusAll]);
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
        $user = auth()->user()->people_id;
        $people = People::where('id', $user)->first();
        $orderServices = $this->orderServiceModel->paginate(20); // whereNotNull('rg')->
        $equipaments = DB::select('SELECT * FROM equipaments WHERE equipaments.peoples_id =' . $user);
        
        // dd($teste);
        return view('orderService.add', [       
            'equipaments' => $equipaments,
            'user' => $user,
            'people' => $people,
            'orderServices' => $orderServices,
            ]);
    }
    // Função Responsavel por salvar um novo orderServiceo no banco
    public function save(\App\Requests\orderServiceRequest $request)
    {
        $insert = 0;
        try{
            $insert = orderService::create($request->all());
            $orderService = orderService::find($insert->id);
            $orderService->status_id = '1';
            $orderService->save();

        }catch(Exception $e){
            echo('Erro!');
        }finally{
            if ($insert){
            return redirect()
                ->route('orderService.index')
                ->with('success', 'Sua Ordem de serviço foi criada!     Aguarde um contato.');
            }
        }
    }
    public function estimate(\App\Requests\estimateRequest $request)
    {
        $insert = 0;
        try{
            $insert = estimate::create($request->all());
            
            $orderService = orderService::find($request->id_solicitacao);
            $orderService->estimate_id = $insert->id;
            $orderService->status_id = $request->StatusAll;
            $orderService->save();

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
        if(!$orderService){
            \Session::flash('flash_message', [
                'msg'=>"Não existe essa Ordem de servico cadastrado, deseja cadastrar um novo orderServiceo?",
                'class'=>"alert-danger"
            ]);
            return redirect()->back();
        }
        return view('orderService.edit', ['orderService' => $orderService]);
        
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
        
        $orderService->delete();

        alert()->success('', 'Deletado com Sucesso')->persistent('OK');

        return redirect()->route('orderService.index');        
        
    }
}
