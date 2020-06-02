<?php namespace Nexo\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class ServiceNoveltyValidator extends LaravelValidator
{
    protected $rules = [
        'service_id' => 'required|exists:services,id',
        'observation' => 'required'
    ];
}