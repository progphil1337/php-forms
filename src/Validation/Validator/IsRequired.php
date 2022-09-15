<?php

declare(strict_types=1);

namespace ProgPhil1337\Forms\Validation\Validator;

use ProgPhil1337\Forms\Validation\Validator;

/**
 * IsRequired
 *
 * @package ProgPhil1337\Forms\Validation\Validator
 * @author Philipp Lohmann <lohmann.philipp@gmx.net>
 */
class IsRequired extends Validator
{

    public function __construct(bool $required)
    {
        parent::__construct('required', $required, true);
    }

    public function validate(mixed $value): bool
    {
        return !empty($value);
    }

    public function getErrorMessage(mixed $value): string
    {
        return 'Field is required';
    }
}