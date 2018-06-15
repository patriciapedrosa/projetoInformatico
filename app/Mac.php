<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mac extends Model
{
    protected $fillable = [
        'mac_adress', 'configured', 
    ];

    public function markAsConfigured()
    {

        $this->configured = 1;
        $this->save();
    }

    public function ConfiguradoToStr()
    {
        switch ($this->configured) {
            case 0:
                return 'NAO';
            case 1:
                return 'SIM';
        }
        return 'Unknown';
    }
}
