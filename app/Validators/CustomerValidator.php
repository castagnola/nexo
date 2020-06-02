<?php namespace Nexo\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class CustomerValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'document_type' => 'required',
            'document' => 'required',
            'team_id' => 'required|exists:teams,id',
            'addresses' => 'required|array',
            'phones' => 'required|array',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'document_type' => 'required',
            'document' => 'required'
        ]
    ];
}