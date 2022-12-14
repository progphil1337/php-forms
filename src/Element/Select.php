<?php

declare(strict_types=1);

namespace ProgPhil1337\Forms\Element;

use ProgPhil1337\Forms\AbstractInput;
use ProgPhil1337\Forms\Enum\InputType;
use ProgPhil1337\Forms\Validation\Validator\InArray;
use ProgPhil1337\HTML\Attribute;
use ProgPhil1337\HTML\Element;

/**
 * Select
 *
 * @package ProgPhil1337\Forms\Element
 * @author Philipp Lohmann <lohmann.philipp@gmx.net>
 */
class Select extends AbstractInput
{
    /** @var array<Element> */
    private array $optionElements = [];

    public function __construct(string $name, array $options, string $label = null)
    {
        $select = (new Element('select'))
            ->addAttribute(new Attribute('name', $name));

        foreach ($options as $value => $text) {
            $element = (new Element('option'))
                ->addAttribute(new Attribute('value', $value))
                ->innerText($text);

            $select->addElement($element);

            $this->optionElements[$value] = $element;
        }

        $this->elements[] = $select;

        parent::__construct($name, InputType::SELECT, $label);

        $this->addValidator(new InArray(array_keys($options)));
    }

    public function setValue(mixed $value): self
    {
        $this->value = $value;

        foreach ($this->optionElements as $val => $element) {
            if ($val === $value) {
                $element->addAttribute(new Attribute('selected'));
            } else {
                $attr = $element->getAttribute('selected');
                if ($attr !== null) {
                    $element->removeAttribute($attr);
                }
            }
        }

        return $this;
    }
}