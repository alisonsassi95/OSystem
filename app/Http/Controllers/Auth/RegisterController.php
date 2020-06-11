<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Contact;
use App\People;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function main(){
        return view('vendor.adminlte.main');
    }


    public function RegisterForm(Request $request)
    {
        if($request['password']!=null){
            $request['password'] = bcrypt( $request['password']);
        }else{    
            unset( $request['password']);
        }
        $data = $request->all();
        $data['profile'] = 2;
        $people = People::create($data);
        //Criaçao do Usuário
        $usuario = $request->all();
        $usuario['people_id'] = $people->id;
        User::create($usuario);
        return redirect()
                        ->route('login')
                        ->with('success', 'Sucesso ao atualizar!');
    }
    
    public function ContactForm(Request $request)
    {
        Contact::create($request->all());
        return redirect()
                        ->route('mensagem')
                        ->with('success', 'Sucesso ao atualizar!');
        
    }
}
