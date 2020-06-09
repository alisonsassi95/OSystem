<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estimate extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'estimate';
    protected $fillable = [
        'service',
        'value',
        'data_estimate',
        'description',
    ];

}
