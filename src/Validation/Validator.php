<?php

declare(strict_types=1);

namespace ProgPhil1337\Forms\Validation;

use ProgPhil1337\HTML\Attribute;

/**
 * Validator
 *
 * @package ReactWeb\Form\Validation
 * @author Philipp Lohmann <lohmann.philipp@gmx.net>
 */
abstract class Validator
{

    public function __construct(
        public readonly string $key,
        public readonly mixed $val,
        private readonly bool $attribute = false
    ) {

    }

    abstract public function validate(mixed $value): bool;

    abstract public function getErrorMessage(mixed $value): string;

    public function getAttribute(): ?Attribute
    {
        return $this->attribute ? new Attribute($this->key, (string)$this->val) : null;
    }
}