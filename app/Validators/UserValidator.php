<?php namespace Nexo\Validators;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;
use Validator;
use Illuminate\Validation\Factory;

class UserValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:users,email'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]
    ];
}