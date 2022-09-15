<?php

declare(strict_types=1);

namespace ProgPhil1337\Forms\Enum;

/**
 * RequestMethod
 *
 * @package ProgPhil1337\Forms\Enum
 * @author Philipp Lohmann <lohmann.philipp@gmx.net>
 */
enum RequestMethod: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case DELETE = 'DELETE';
    case OPTIONS = 'OPTION';
}