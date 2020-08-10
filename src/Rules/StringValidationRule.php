<?php

namespace Henrywhitaker3\Healthchecks\Rules;

use Rakit\Validation\Rule;

class StringValidationRule extends Rule
{
    protected $message = ':attribute :value has been used';

    public function __construct()
    {
        //
    }

    public function check($value): bool
    {
        if(is_string($value)) {
            return true;
        }

        return false;
    }
}