<?php

declare(strict_types=1);

namespace ProgPhil1337\PhpForms\Enum;

use ProgPhil1337\PhpForms\Validation\Validator\Mail;

/**
 * InputType
 *
 * @package ProgPhil1337\PhpForms\Enum
 * @author Philipp Lohmann <lohmann.philipp@gmx.net>
 */
enum InputType: string
{
    case TEXT = 'text';
    case BUTTON = 'button';
    case CHECKBOX = 'checkbox';
    case COLOR = 'color';
    case DATE = 'date';
    case DATETIME_LOCAL = 'datetime-local';
    case EMAIL = 'email';
    case FILE = 'file';
    case HIDDEN = 'hidden';
    case IMAGE = 'image';
    case MONTH = 'month';
    case NUMBER = 'number';
    case PASSWORD = 'password';
    case RADIO = 'radio';
    case RANGE = 'range';
    case RESET = 'reset';
    case SEARCH = 'search';
    case TEL = 'tel';
    case TIME = 'time';
    case URL = 'url';
    case WEEK = 'week';
    case SUBMIT = 'submit';
    case SELECT = 'select';

    public function getDefaultValidators(): array
    {
        return match ($this) {
            self::EMAIL => [
                Mail::class
            ],
            default => []
        };
    }
}