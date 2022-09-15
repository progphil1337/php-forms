<?php

declare(strict_types=1);

namespace ProgPhil1337\PhpForms\Element;

use ProgPhil1337\PhpForms\AbstractInput;
use ProgPhil1337\PhpForms\Enum\InputType;
use ProgPhil1337\PhpForms\Validation\Validator\InArray;
use ProgPhil1337\PhpHtml\Attribute;
use ProgPhil1337\PhpHtml\Element;

/**
 * Radio
 *
 * @package ProgPhil1337\PhpForms\Element
 * @author Philipp Lohmann <lohmann.philipp@gmx.net>
 */
class Radio extends AbstractInput
{
    /**
     * @param string $name
     * @param array<string,mixed> $options
     */
    public function __construct(string $name, array $options, string $label = null)
    {
        foreach ($options as $value => $text) {

            $id = sprintf('%s_%s', $name, $value);

            $this->elements[] = (new Element('input', true))
                ->addAttribute(new Attribute('name', $name))
                ->addAttribute(new Attribute('value', $value))
                ->addAttribute(new Attribute('type', InputType::RADIO->value))
                ->addAttribute(new Attribute('id', $id));

            $this->elements[] = (new Element('label'))
                ->addAttribute(new Attribute('for', $id))
                ->innerText($text);
        }

        parent::__construct($name, InputType::RADIO, $label);

        $this->addValidator(new InArray(array_keys($options)));
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue(mixed $value): self
    {
        $this->value = $value;

        foreach ($this->elements as $element) {
            $attribute = $element->getAttribute('value');
            if ($attribute !== null && $attribute->getValue() === $value) {
                $element->addAttribute(new Attribute('checked'));
            }
        }

        return $this;
    }
}