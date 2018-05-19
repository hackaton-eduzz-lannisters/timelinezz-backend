<?php

namespace App\Validators;

abstract class AbstractValidator
{
    protected abstract function rules(array $data);
    
    protected abstract function messages();
}