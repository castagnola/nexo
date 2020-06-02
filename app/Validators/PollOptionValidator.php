<?php namespace Nexo\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;
use Validator;

class PollOptionValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'poll_question_id' => 'required',
            'option' => 'required'
        ],
        validatorInterface::RULE_UPDATE => []
    ];


}