<?php

namespace Nexo\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class LangValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		'name'	=>'	required',
		'code'	=>'	required',
		'content'	=>'	required',
	],
        ValidatorInterface::RULE_UPDATE => [
		'name'	=>'	required',
		'code'	=>'	required',
		'content'	=>'	required',
	],
   ];

}