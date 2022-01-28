<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;

class CustomValidator extends Validator
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function validateEmptyWith($attribute, $value, $parameters)
    {
        return ($value != '' && $this->getValue($parameters[0]) != '') ? false : true;
    }
}
