<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class People extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'peoples';
     protected $fillable = [
        'profile',
        'name',
        'birthdate',
        'genre',
        'cpf',
        'rg',
        'address',
        'number',
        'district',
        'complement',
        'cep',
        'telephone',
        'email',
        'obs',
        'state',
        'city'
    ];

    public function users(){
        return $this->hasOne(User::class);
    }

    public function orderservices(){
        return $this->hasMany(orderServices::class);
    }

}
