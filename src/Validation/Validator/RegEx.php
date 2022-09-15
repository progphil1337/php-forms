<?php

declare(strict_types=1);

namespace ProgPhil1337\PhpForms\Validation\Validator;

use ProgPhil1337\PhpForms\Validation\Validator;

/**
 * RegEx
 *
 * @package ProgPhil1337\PhpForms\Validation\Validator
 * @author Philipp Lohmann <lohmann.philipp@gmx.net>
 */
class RegEx extends Validator
{

    public function __construct(private readonly mixed $pattern)
    {
        parent::__construct('regex', $this->pattern);
    }

    public function validate(mixed $value): bool
    {
        return preg_match($this->pattern, $value) !== false;
    }

    public function getErrorMessage(mixed $value): string
    {
        return sprintf('%s does not match the pattern %s', $value, $this->pattern);
    }
}