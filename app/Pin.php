<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
	protected $fillable = [
        'id','sensor_id','numero_pin'
    ];

    public function sensor()
    {
    	return $this->belongsTo(\App\Sensor::class, 'sensor_id','id');
    }

    
}
