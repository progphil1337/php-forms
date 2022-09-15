<?php

declare(strict_types=1);

namespace ProgPhil1337\Forms\Validation\Validator;

use ProgPhil1337\Forms\Validation\Validator;

/**
 * Number
 *
 * @package ProgPhil1337\Forms\Validation\Validator
 * @author Philipp Lohmann <lohmann.philipp@gmx.net>
 */
class IsNumeric extends Validator
{

    public function __construct()
    {
        parent::__construct('isnumeric', null);
    }

    public function validate(mixed $value): bool
    {
        return is_numeric($value);
    }

    public function getErrorMessage(mixed $value): string
    {
        return sprintf('%s is not numeric', $value);
    }
}