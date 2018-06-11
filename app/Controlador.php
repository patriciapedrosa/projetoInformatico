<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Controlador extends Model
{
	protected $fillable = [
        'id','mac','configurado'
    ];

    public function sensores()
    {
    	return $this->hasMany(\App\Sensor::class, 'sensor_id');
    }

    public function ConfiguradoToStr()
    {
        switch ($this->configurado) {
            case 0:
            return 'NAO';
            case 1:
            return 'SIM'; 
        }
        return 'Unknown';
    }

    public function isConfigurado()
    {
        return $this->configurado == 1;
    }

    public function isNaoConfigurado()
    {
        return $this->configurado == 0;
    }

}