<?php

namespace App\Http\Controllers;

use App\User;
use App\People;
use Illuminate\Http\Request;
use App\Requests\UserRequest;
use Alert;
use Session;
use DB;
use Auth;
use Image;

class UserController extends Controller
{
    
    protected $user;
    public function __construct(User $user)
    {   
        $this->user = $user;
        $this->middleware('auth');
        
    }
    protected $peopleModel;
    public function __constructP(People $peopleModel)
    {   
        $this->peopleModel = $peopleModel;
        $this->middleware('auth');
    }

    public function index()
    {
        
        $results = $this->user->paginate(20); // whereNotNull('rg')->
        return view('User.index',['results' => $results]);
    }

    public function perfilAtualiza(Request $request){

        
        if($request->hasFile('avatar')){
            $avatar=$request->file('avatar');
            
            $nome_arquivo=time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/imagens/avatar/' . $nome_arquivo));
           
            $user=Auth::user();
            $user->avatar = $nome_arquivo;
            $user->save();

        }

        $user = auth()->user();
        $peoples = People::all()->find($user->people_id);
         return view('profile', ['user'=>Auth::user(), 'peoples' => $peoples]);
         //return view('profile',array('user'=>Auth::user(),$peopleModel));

    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();

        $data = $request->all();

        if ($data['password'] != null)
            $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);

        $update = $user->update($data);
        
        if ($update)
        
            return redirect()
                        ->route('profile')
                        ->with('success', 'Sucesso ao atualizar!');

        return redirect()
                    ->back()
                    ->with('error', 'Falha ao atualizar o perfil...');
    }
    //Responsavel por trazer a tela de cadastro de Usuários
    public function add()
    {
        $results = user::all();
        $peoples = People::all();
        return view('User.add', ['results' => $results, 'peoples' => $peoples]);
    }

    //Responsavel pelo cadastro de um novo usuário
    public function save(UserRequest $request)
    {
        if($request['password']!=null){
        $request['password'] = bcrypt( $request['password']);
        }else{    
        unset( $request['password']);
        }
       $insert = user::create($request->all()); 
       
       // Verifica se inseriu com sucesso
                return redirect()
                        ->back()
                        ->with('success', 'Cadastrado com Sucesso!');
            
       
        
    }
    //Responsavel por trazer a tela de Edição de Usuario
    public function edit ($id)
    {
        $users = user::find($id);
        if(!$users){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse pessoa cadastrada, deseja cadastrar nova pessoa?",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('User.add');
        }
        return view('User.edit', compact('User'));
    }

    public function load($id)
    {
        $people = People::find($id);
        
        return view('User.add', ['people' => $people]);
    }


    public function profile()
    {
        $user = auth()->user();
        
        $peoples = People::all()->find($user->people_id);
        
        return view('profile', ['results' => $user, 'peoples' => $peoples]);
    }

    
    public function update(Request $request, $id)
    {
        Session::flash('message', 'Olá');
        user::find($id)->update($request->all());
        
        return redirect()->route('User.index');        
        
    }

    public function updateProfile(Request $request, $id)
    {
        People::find($id)->update($request->all());
        
        return redirect()->route('profile')->with('success','Perfil Atualizado com Sucesso');        
        
    }

    public function editProfile($id)
    {
        $user = auth()->user();
        
        $peoples = People::all()->find($id);
        
        return view('profile', ['results' => $user, 'peoples' => $peoples]);
    }

    public function delete($id)
    {
        $users = user::find($id);
        
        $users->delete();
         \Session::flash('flash_message',[
            'msg'=>"usuário atualizada com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('User.index')->with('success', 'cadastrada com sucesso!');      
        
    }
}
