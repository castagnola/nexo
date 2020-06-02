<?php namespace Nexo\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;
use Validator;

class PollQuestionValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'poll_id' => 'required',
            'question' => 'required',
            'type' => 'required',
        ],
        validatorInterface::RULE_UPDATE => []
    ];
}