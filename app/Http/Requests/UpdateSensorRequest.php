<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'nome' => 'required|string|max:50',
            'tipo' => 'required|between:0,1',
            'grandeza' => 'required|string|max:50',
            'inativo' => 'required|between:0,1',
            'pin' => ['required','between:0,2', new PinRule]
        ];
    }
}
