<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
	protected $fillable = [
       'nome', 'tipo', 'grandeza', 'inativo','pin','thing_id'
    ];
    

    /*public function pins()
    {
        return $this->hasMany(\App\Pin::class, 'pin_id');
    }*/

    public function controlador()
    {
        return $this->belongsTo(\App\Thing::class, 'thing_id','id');
    }

    public function tipoToStr()
    {
        switch ($this->tipo) {
            case 0:
                return 'Digital';
            case 1:
                return 'Analogico';
        }
        return 'Unknown';
    }

    public function inativoToStr()
    {
        switch ($this->inativo) {
            case 0:
                return 'Não';
            case 1:
                return 'Sim';
        }
        return 'Unknown';
    }

}
