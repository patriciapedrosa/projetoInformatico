<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PinRule;
use App\Rules\TipoRule;
use App\Sensor;


class UpdateSensorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Sensor::delete($this->pin);
        $pin = $this->pin;
        $id =$this->sensor_id;

        return [
            'nome' => 'required|string|max:50',
            'tipo' => ['required','between:0,1', new TipoRule($pin)],
            'grandeza' => 'required|string|max:50',
            'ativo' => 'required|between:0,1',
            'pin' => ['required', new PinRule($id)]
        ];
    }
}
