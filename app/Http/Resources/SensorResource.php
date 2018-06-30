<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class SensorResource extends JsonResource
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
            'id' => $this->id,
            'nome' => $this->nome,
            'tipo' => $this->tipo,
            'pin' => $this->pin,
            'grandeza' => $this->grandeza,
            'ativo' => $this->ativo,
            'configDate' => Carbon::parse($this->configDate)->format('YmdHis'),
            ];

    }
}
