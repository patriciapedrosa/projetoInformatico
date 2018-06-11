<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rede extends Model
{
	protected $fillable = [
       'ip','netmask','gateway','dns','ssid','password',
    ];
    

}
