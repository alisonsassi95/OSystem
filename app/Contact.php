<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'contact';
    protected $fillable = [
        'name',
        'cnpj',
        'contact_phone',
        'email',
        'description',  
    ];

}
