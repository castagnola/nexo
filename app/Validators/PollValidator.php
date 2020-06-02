<?php namespace Nexo\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;
use Validator;

class PollValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'team_id' => 'required',
        ],
        validatorInterface::RULE_UPDATE => []
    ];
}