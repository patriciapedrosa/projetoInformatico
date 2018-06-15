<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
	protected $fillable = [
       'nome', 'tipo', 'leitura', 'tipo_leitura','thing_id'
    ];
    

    public function pins()
    {
        return $this->hasMany(\App\Pin::class, 'pin_id');
    }

    public function controlador()
    {
        return $this->belongsTo(\App\Thing::class, 'thing_id','id');
    }

}
