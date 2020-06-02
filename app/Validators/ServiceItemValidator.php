<?php namespace Nexo\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class ServiceItemValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|unique:services_items,name',
        'description' => 'required'
    ];
}