<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
	protected $fillable = [
       'nome', 'tipo', 'grandeza', 'ativo','pin','thing_id', 'id'
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

    public function ativoToStr()
    {
        switch ($this->ativo) {
            case 0:
                return 'Não';
            case 1:
                return 'Sim';
        }
        return 'Unknown';
    }

}
