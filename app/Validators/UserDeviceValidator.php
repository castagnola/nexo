<?php namespace Nexo\Validators;


use Prettus\Validator\LaravelValidator;

class UserDeviceValidator extends LaravelValidator
{
    protected $rules = [
        'uuid' => 'required',
        'user_id' => 'required|exists:users,id',
        'platform' => 'required'
    ];
}