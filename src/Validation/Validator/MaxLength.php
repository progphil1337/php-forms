<?php

declare(strict_types=1);

namespace ProgPhil1337\PhpForms\Validation\Validator;

use ProgPhil1337\PhpForms\Validation\Validator;

/**
 * MaxLength
 *
 * @package ProgPhil1337\PhpForms\Validation\Validator
 * @author Philipp Lohmann <lohmann.philipp@gmx.net>
 */
class MaxLength extends Validator
{
    public function __construct(int $max)
    {
        parent::__construct('maxlength', $max, true);
    }

    public function validate(mixed $value): bool
    {
        $string = (string)$value;

        return strlen($string) <= $this->val;
    }

    public function getErrorMessage(mixed $value): string
    {
        return sprintf('Max length of %s characters exceeded', $this->val);
    }
}