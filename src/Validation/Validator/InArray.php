<?php

declare(strict_types=1);

namespace ProgPhil1337\PhpForms\Validation\Validator;

use ProgPhil1337\PhpForms\Validation\Validator;

/**
 * DefaultSelectValidValue
 *
 * @package ProgPhil1337\PhpForms\Validation\Validator
 * @author Philipp Lohmann <lohmann.philipp@gmx.net>
 */
class InArray extends Validator
{

    /**
     * @param array<string> $allowedValues
     */
    public function __construct(private readonly array $allowedValues)
    {
        parent::__construct('inarray', null);
    }

    public function validate(mixed $value): bool
    {
        return in_array($value, $this->allowedValues, true);
    }

    public function getErrorMessage(mixed $value): string
    {
        return sprintf('%s is invalid. Valid values: %s', $value, implode(', ', $this->allowedValues));
    }
}