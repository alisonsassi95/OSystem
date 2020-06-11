<?php

namespace App\Http\Controllers;

use App\Contact;
use App\user;
use Illuminate\Http\Request;
use App\Requests\ContactRequest;
use App\Requests\userRequest;
use Alert;
class ContactController extends Controller
{
    protected $ContactModel;
    //Construtores responsaveis pela inicialização da Classe
    public function __construct(Contact $ContactModel)
    {   
        $this->ContactModel = $ContactModel;
        $this->middleware('auth');
    }
    public function __constructE(user $user)
    {

        $this->user = $user;
        $this->middleware('auth');
    }

    // Função responsavel por trazer todos os Contactos cadastrados
    public function index()
    {
        $Contacts = Contact::all();
        return view('Contact.index',['Contacts' => $Contacts]);
    }
    
    // Função Responsavel por salvar um novo Contacto no banco
    public function saveForm(Request $request)
    {
        dd('teste');
        
    }
   
    // Função Responsavel por trazer a tela de edição de Contactos
    public function edit ($id)
    {
        
        $Contact = Contact::find($id);
        $results = user::all();
        if(!$Contact){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse Contacto cadastrado, deseja cadastrar um novo Contacto?",
                'class'=>"alert-danger"
            ]);
            return redirect()->back();
        }
        return view('Contact.edit', ['Contact' => $Contact,'results' => $results]);
        
    }
    // Função Responsavel por salvar a edição de um Contacto
    public function update(Request $request, $id)
    {
        
        Contact::find($id)->update($request->all());

        return redirect()
                ->route('Contact.index')
                ->with('info', 'Atualizado com sucesso!');        
        
    }
    // Função Responsavel pela exclusão de um Contacto
    public function delete($id)
    {
        $Contact = Contact::find($id);
        
        $Contact->delete();

        alert()->success('', 'Deletado com Sucesso')->persistent('OK');

        return redirect()->route('Contact.index');        
        
    }
}
