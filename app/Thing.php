<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    protected $fillable = [
        'id', 'mac', 'configurado', 'ip','netmask','gateway','dns','ssid','password', 'configDate'
    ];

    public function sensores()
    {
        return $this->hasMany(\App\Sensor::class);
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
