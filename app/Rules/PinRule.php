<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Sensor;

class PinRule implements Rule
{
    protected $id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

            return is_null(Sensor::where('pin',$value)->where('id','!=', $this->id)->where('thing_id', session('id_thing'))->first());

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'pin already exists';
    }
}
