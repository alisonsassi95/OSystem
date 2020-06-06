<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderService extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'orderService';
    protected $fillable = [
        'problem',
        'data_hora',
        'data_hora_entrega',
        'equipaments_id',
        'peoples_id',
    ];

}
