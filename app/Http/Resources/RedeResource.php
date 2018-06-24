<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class RedeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'ip' => $this->ip,
            'netmask' => $this->netmask,
            'gateway' => $this->gateway,
            'dns' => $this->dns,
            'ssid' => $this->ssid,
            'password' => $this->password,
            'configDate' => Carbon::parse($this->configDate)->format('YmdHis'),
        ];
    }
}
