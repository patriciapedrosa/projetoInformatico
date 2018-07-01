<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Sensor;

class TipoRule implements Rule
{
    protected $pin;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($pin)
    {
        $this->pin = $pin;
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
        if($this->pin == 'A0'){
            return $value == 1;
       }else{
        return $value == 0;
       }
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Pin AO is only for analog sensors';
    }
}
