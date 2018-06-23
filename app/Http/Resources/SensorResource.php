<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'nome' => $this->nome,
            'tipo' => $this->tipo,
            'pin' => $this->pin,
            'grandeza' => $this->grandeza,
            'inativo' => $this->inativo,
            ];

    }
}