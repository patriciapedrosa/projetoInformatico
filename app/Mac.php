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
}
