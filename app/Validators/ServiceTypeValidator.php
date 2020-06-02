<?php namespace Nexo\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class ServiceTypeValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required',
        //'description' => 'required',
        'avg_response_time' => 'required|time_duration',
    ];
}