<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('main');
});
    
    route::view('/main', "index.main")->name('main');
    route::view('/whoareus', "index.whoareus")->name('whoareus');
    route::view('/ourservices', "index.ourservices")->name('ourservices');
    route::view('/contact', "index.contact")->name('contact');
    route::view('/mensagem', "index.mensagem")->name('mensagem');
    route::view('/prices', "index.prices")->name('prices');
    route::view('/register', "index.register")->name('register');

    Route::get('RegisterForm', 'Auth\RegisterController@RegisterForm')->name('RegisterForm');

    Route::get('ContactForm', 'Auth\RegisterController@ContactForm')->name('ContactForm');

    Route::get('/login', 'Auth\LoginController@isLogged')->name('login');
    Route::post('/authentication', 'Auth\LoginController@authentication')->name('authentication');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    //HOME
    Route::view('/home', 'home')->name('home'); 
    Route::get('/home', ['uses'=>'HomeController@index', 'as' => 'home']);  
    

Route::group( [ 'middleware' => 'auth'], function()
{

    Route::view('/Profile', 'profile')->name('profile')->middleware('auth'); 
    Route::get('/Profile', ['uses'=>'UserController@profile', 'as' => 'profile']);
    Route::post('/Profile', ['uses'=>'UserController@profile', 'as' => 'profile']);

    Route::post('/Profile/update/{id}', ['uses'=>'UserController@updateProfile', 'as' => 'User.updateProfile']);
    Route::post('/perfil', ['uses'=>'UserController@perfilAtualiza','as'=>'User.perfilAtualiza']);

    //Routes user
    Route::get('/User', ['uses'=>'UserController@index', 'as' => 'User.index']);
    Route::get('/User/add', ['uses'=>'UserController@add', 'as' => 'User.add']);
    Route::post('/User/save', ['uses'=>'UserController@save', 'as' => 'User.save']);
    Route::get('/User/edit/{id}', ['uses'=>'UserController@edit', 'as' => 'User.edit']);
    Route::get('/User/updateProfile', ['uses'=>'UserController@profileUpdate', 'as' => 'User.profileUpdate']);
    Route::get('/User/load/{id}', ['uses'=>'UserController@load', 'as' => 'User.load']);
    Route::get('/User/delete/{id}', ['uses'=>'UserController@delete', 'as' => 'User.delete']);
    //Routes people
    Route::get('/people', ['uses'=>'PeopleController@index', 'as' => 'people.index']);
    Route::get('/people/add', ['uses'=>'PeopleController@add', 'as' => 'people.add']);
    Route::post('/people/save', ['uses'=>'PeopleController@save', 'as' => 'people.save']);
    
    Route::get('/people/edit/{id}', ['uses'=>'PeopleController@edit', 'as' => 'people.edit']);
    Route::put('/people/update/{id}', ['uses'=>'PeopleController@update', 'as' => 'people.update']);
    Route::get('/people/delete/{id}', ['uses'=>'PeopleController@delete', 'as' => 'people.delete']);

     //Equipamentos
     Route::get('/equipament', ['uses'=>'EquipamentController@index', 'as' => 'equipament.index']);  
     Route::get('/equipament/add', ['uses'=>'EquipamentController@add', 'as' => 'equipament.add']);
     Route::post('/equipament/save', ['uses'=>'EquipamentController@save', 'as' => 'equipament.save']);
     Route::post('/equipament/saveModal', ['uses'=>'EquipamentController@saveModal', 'as' => 'equipament.saveModal']);
     Route::get('/equipament/edit/{id}', ['uses'=>'EquipamentController@edit', 'as' => 'equipament.edit']);
     Route::put('/equipament/update/{id}', ['uses'=>'EquipamentController@update', 'as' => 'equipament.update']);
     Route::get('/equipament/delete/{id}', ['uses'=>'EquipamentController@delete', 'as' => 'equipament.delete']);

     //Contact
     Route::get('/Contact', ['uses'=>'ContactController@index', 'as' => 'Contact.index']);  
     Route::get('/Contact/edit/{id}', ['uses'=>'ContactController@edit', 'as' => 'Contact.edit']);
     Route::put('/Contact/update/{id}', ['uses'=>'ContactController@update', 'as' => 'Contact.update']);
     Route::get('/Contact/delete/{id}', ['uses'=>'ContactController@delete', 'as' => 'Contact.delete']);
 
     //Order services
     Route::get('/orderService', ['uses'=>'orderServiceController@index', 'as' => 'orderService.index']);  
     Route::get('/orderService/add', ['uses'=>'orderServiceController@add', 'as' => 'orderService.add']);
     Route::post('/orderService/save', ['uses'=>'orderServiceController@save', 'as' => 'orderService.save']);
     Route::get('/orderService/edit/{id}', ['uses'=>'orderServiceController@edit', 'as' => 'orderService.edit']);
     Route::put('/orderService/update/{id}', ['uses'=>'orderServiceController@update', 'as' => 'orderService.update']);
     Route::post('/orderService/estimate', ['uses'=>'orderServiceController@estimate', 'as' => 'orderService.estimate']);
     Route::get('/orderService/delete/{id}', ['uses'=>'orderServiceController@delete', 'as' => 'orderService.delete']);
     Route::get('/orderService/aprovar/{id}', ['uses'=>'orderServiceController@aprovar', 'as' => 'orderService.aprovar']);
     Route::get('/orderService/negar/{id}', ['uses'=>'orderServiceController@negar', 'as' => 'orderService.negar']);
 
    //Usuários
    Route::Post('/people/add/user', ['uses'=>'UserController@save', 'as' => 'user.save']);
   
});