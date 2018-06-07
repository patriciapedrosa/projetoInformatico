<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
	protected $fillable = [
       'nome', 'tipo', 'leitura','controlador_id'
    ];
    

    public function tipoToStr()
    {
        switch ($this->tipo) {
            case 0:
            return 'Analogico';
            case 1:
            return 'Digital'; 
        }

        return 'Unknown';
    }


   /* public function pins()
    {
        return $this->hasMany(\App\Pin::class, 'pins_id');
    }*/

    public function controlador()
    {
        return $this->belongsTo(\App\Controlador::class, 'controlador_id','id');
    }

}
