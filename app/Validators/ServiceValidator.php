<?php namespace Nexo\Validators;

use Prettus\Validator\LaravelValidator;

class ServiceValidator extends LaravelValidator
{
    protected $rules = [
        'team_id' => 'required|exists:teams,id',
        'created_by' => 'required|exists:users,id',
        'customer_id' => 'required|exists:customers,id',
    ];
}