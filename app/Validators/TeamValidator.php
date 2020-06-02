<?php namespace Nexo\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class TeamValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'slug' => 'min:3|required|unique:teams,slug'
        ],
        ValidatorInterface::RULE_UPDATE => []
    ];

}