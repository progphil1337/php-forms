<?php

declare(strict_types=1);

namespace ProgPhil1337\Forms\Element;

use ProgPhil1337\Forms\AbstractInput;
use ProgPhil1337\Forms\Enum\InputType;
use ProgPhil1337\HTML\Attribute;
use ProgPhil1337\HTML\Element;

/**
 * Input
 *
 * @package ProgPhil1337\Forms\Element
 * @author Philipp Lohmann <lohmann.philipp@gmx.net>
 */
class Input extends AbstractInput
{
    public function __construct(string $name, InputType $type, string $label = null)
    {
        $this->elements[] = (new Element('input', true))
            ->addAttribute(new Attribute('name', $name))
            ->addAttribute(new Attribute('type', $type->value));

        parent::__construct($name, $type, $label);
    }

    public function setValue(mixed $value): self
    {
        $this->value = $value;

        $attributeName = 'value';
        $attribute = $this->elements[0]->getAttribute($attributeName);
        if ($attribute !== null) {
            $attribute->setValue($value);
        } else {
            $this->elements[0]->addAttribute(new Attribute($attributeName, $value, true));
        }

        return $this;
    }
}